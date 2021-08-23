<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesignerRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Designer;
use App\Models\DesignerCategory;
use App\Models\Project;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignerController extends Controller
{
    public function index(){
    return view('front.designer.profile');
    }
    public function register(){
        $categories = DesignerCategory::selection()->get();
        if (Auth::guard('web') ->check()){
            return redirect(RouteServiceProvider::HOME);
        }else{
            return view('front.designer.register',compact('categories'));
        }

    }
    public function store(Request $request){

        try {
            $coverPath='';
            if ($request ->has('cover')){
                $coverPath = uploadImage('designer',$request ->cover);
            }

            $filePath = '';
            if ($request ->has('logo')){
                $filePath = uploadImage('designer',$request ->logo);
            }
            if ($request -> password == $request ->password_confirm){

                $designer =  Designer::insertGetId([
                    'phone' => $request ->phone,
                    'about_us' => $request ->about_us,
                    'address' => $request ->address,
                    'website' => $request ->website,
                    'price_hour' => $request ->price,
                    'graduated' => $request ->graduated,
                    'category_prof_id' => json_encode($request->category_id) ,
                    'photo' => $coverPath


                ]);
                User::insert([
                    'password' => bcrypt($request -> password),
                    'name' => $request -> name,
                    'email' => $request -> email,
                    'photo' => $filePath,
                    'designers_id' => $designer
                ]);

            }else{
                return redirect()->route('designer.show.register')->with(['error' => 'password not matched']);
            }
            return redirect() ->route('login')->with(['success' => 'Your account create pleas sign in pleas']);

        }catch (\Exception $ex){

            return redirect()->route('designer.show.register')->with(['error' =>'We have an a problem pleas try again later']);
        }


}


    public function project(Request $request)
    {
        try {

            $filePath = '';
            if ($request ->has('photo')){
                $filePath = uploadImage('projects',$request->photo);

            }

            if ($request->hasFile('image')){
                $image = array();
                if ($files = $request->file('image')){
                    foreach ($files as $file){
                        $image_name = md5(rand(1000,10000));
                        $ext = strtolower($file -> getClientOriginalExtension());
                        $image_full_name = $image_name .'.' . $ext;
                        $upload_path ='assets/images/projects/';
                        $image_url = $upload_path.$image_full_name;
                        $file ->move($upload_path , $image_full_name);
                        $image[] = $image_url;

                    }
                }
            }

            $id = Auth::user()->id;
            Project::create([
                'name'=> $request->title,
                'address'=> $request->address,
                'description'=> $request->description,
                'date'=> $request->date,
                'photo'=> $filePath,
                'filename'=> implode('|' , $image),
                'designer_id'=>$id,

            ]);
            return redirect()->route("designer.profile")->with(["success" => 'The project has been successfully added ']);

        }catch (\Exception $ex){

            return redirect()->route("designer.profile")->with(["error" => 'There is something wrong']);
        }

    }
public function profile(){
     $id = Auth::user()->id;
    $user = User::selection()->find($id);
    $user_designer = Auth::user()->designers_id;
        $designer = Designer::selection()->find($user_designer);
     $categories = Designer::select(['category_prof_id'])
        ->find($user_designer);
    $category_designer = DesignerCategory::selection()->get();
        $projects = Project::selection()->where('designer_id','=' , $id)->get();
        $comments = Comment::selection()->where('designer_id','=' , $id)->get();
    $commentsCount = Comment::selection()->where('designer_id','=' , $id)->count();

        if ($user_designer != null ){
            return view('front.designer.profile',compact('user' ,'comments','commentsCount', 'designer','categories','projects'));
        }else{
            return redirect()->route('home');
        }

}

public function searchDesigner(){
        $categories = DesignerCategory::selection()->get();
        return view('front.designer.finddesigner', compact('categories'));
}

public function list(){
    $users = User::selection()->where('designers_id','!=', null)->get();

    $designers = Designer::selection()->get();
    return view('front.designer.designerList' , compact('users','designers'));
}
public function designerShow($id){
    $user = User::selection()->find($id);
    $projects = Project::selection()->where('designer_id','=' , $id)->get();
    $comments = Comment::selection()->where('designer_id','=' , $id)->get();
    $commentsCount = Comment::selection()->where('designer_id','=' , $id)->count();

    return view('front.designer.designerpage',compact('user' ,'projects','comments','commentsCount'));


}
    public function search(Request $request ){

        $usersCount = User::selection()->where('name','like','%'.$request->input('find').'%')->count();
        if ($usersCount == 0){
            return redirect()->route('designer.find.page')->with(['error' => 'We Donot Have this Interior Designer pleas try again later']);
        }
        $users = User::selection()->where('name','like','%'.$request->input('find').'%')->get();
        return view('front.designer.designerSearchList',compact('users'));

    }
}
