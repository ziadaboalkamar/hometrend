<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Designer;
use App\Models\DesignerCategory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function index()
    {
        $products = Product::selection()->orderByRaw('updated_at - created_at DESC')->get();
        return view('front.home',compact('products'));

    }

    public function profile()
    {
        try {
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
                return view('front.designer.profile',compact('user' ,'commentsCount', 'designer','categories','projects','comments'));
            }elseif ($user_designer == null){
                $orders = Order::selection()->where('user_id','=',$id)->get();
                return view('front.user.profile',compact('user','orders'));
            }elseif (!Auth::user()){
                return route('home');
            }
        }catch (\Exception $ex){
            return redirect()->route('login')->with(['success' => 'you should have an account']);
        }


    }

    public function edit(){
        $id = Auth::user()->id;
        $user = User::selection()->find($id);
        return view('front.user.edit',compact('user'));
    }
    public function update($id,Request $request){

        try {


        $user = User::selection()->find($id);
$filePath = '';
        if ($request ->has('photo')){
            $filePath = uploadImage('user',$request ->photo);
            User::where('id' , $id) -> update([
                'photo' => $filePath,
            ]);
        }
        User::where('id' , $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,


        ]);
            return redirect()->route("user.show.profile")->with(["success" => 'Update Successfully']);

        }catch (\Exception $exception){
            return redirect()->route("user.show.profile")->with(["error" => 'We have an error pleas try again later']);

        }

    }
    public function about(){
        return view('front.about us.index');
    }
    public function search(Request $request ){
        $productsCount = Product::selection()->where('name','like','%'.$request->input('search').'%')->count();
        if ($productsCount == 0){
            return redirect()->route('user.search')->with(['error' => 'We Donot Have this item pleas try again later']);
        }
      $products = Product::selection()->where('name','like','%'.$request->input('search').'%')->get();
      return view('front.categories.search',compact('products'));

    }


}
