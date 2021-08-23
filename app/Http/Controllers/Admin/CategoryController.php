<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CategoryController extends Controller
{
  public function index(){
      $categories = Category::selection()->get();
      return view("admin.categories.index" , compact("categories"));
  }

    public function create(){
      return view('admin.categories.create');
    }
    public function store(CategoryRequest $request){
        try {
            $filePath = '';
            if ($request ->has('photo')){
                $filePath = uploadImage('categories',$request ->photo);

            }

         Category:: insert([
                'name' => $request ->category_name,
                'photo' => $filePath,

            ]);
            return redirect() ->route('admin.categories')->with(['success' => 'تم الحفظ بنجاح']);

        }catch (\Exception $ex){

            return redirect() ->route('admin.categories')->with(['error' => 'حدث خطاء ما الرجاء المحاولة لاحقا']);

        }
    }
    public function edit($id){
     $category = Category::selection()->find($id);
        if (!$category){
            return redirect() ->route('admin.categories')->with(['error' => 'هذا القسم غير موجود ']);
        }
        return view('admin.categories.edit' , compact('category'));
    }
    public function update(CategoryRequest $request , $id){
        try {
            $category = Category::selection()->find($id);
            if (!$category){
                return redirect() ->route('admin.categories')->with(['error' => 'هذا القسم غير موجود ']);
            }

            if (!$request ->has('category_active')){
                $request->request->add(['active' =>0]);
            }else{
                $request->request->add(['active' =>1]);

            }
            Category::where('id' , $id)-> update([
                'name' => $request ->category_name,
                'active' => $request -> active

            ]);

            //save image

            if ($request ->has('photo')){
                $filePath = uploadImage('categories',$request ->photo);
                Category::where('id' , $id)->update([

                    'photo' => $filePath,


                ]);
            }

            return redirect() ->route('admin.categories')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return redirect() ->route('admin.categories')->with(['error' => 'حدث خطاء ما الرجاء المحاولة لاحقا']);

        }
    }

public function destroy($id){
    try {
        $category= Category::find($id);
        if (!$category){
            return redirect()->route('admin.categories.edit' , $id)->with(["error" => "هذا القسم غير موجودو"]);
        }
        $category ->delete();



        return redirect()->route('admin.categories')->with(["success" => "تم حذف القسم بنجاح"]);
    }catch (\Exception $ex){
        return redirect()->route('admin.categories.edit')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

    }
}
public function unactive($id){
    try {
        $category= Category::find($id);
        if (!$category){
            return redirect()->route('admin.categories.edit' , $id)->with(["error" => "هذا القسم غير موجودو"]);
        }

        $activeItem = $category -> active;
        if ($activeItem == 1){
            Category::where('id' , $id)->update([

                'active' => 0,


            ]);

        }


        return redirect()->route('admin.categories')->with(["success" => "تم الغاء تفعيل  القسم بنجاح"]);
    }catch (\Exception $ex){
//return $ex;
        return redirect()->route('admin.categories')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

    }
}
}
