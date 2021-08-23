<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesignerCategoryRequest;
use App\Models\DesignerCategory;
use Illuminate\Http\Request;

class DesignerCategoryController extends Controller
{

    public function index(){
        $categories = DesignerCategory::selection()->get();
        return view("admin.profcategories.index" , compact("categories"));
    }

    public function create(){
        return view('admin.profcategories.create');
    }
    public function store(DesignerCategoryRequest $request){
        try {
            $filePath = '';
            if ($request ->has('photo')){
                $filePath = uploadImage('designerCategories',$request ->photo);

            }

            DesignerCategory:: insert([
                'name' => $request ->category_name,
                'photo' => $filePath,

            ]);
            return redirect() ->route('admin.prof.categories')->with(['success' => 'تم الحفظ بنجاح']);

        }catch (\Exception $ex){

            return redirect() ->route('admin.prof.categories')->with(['error' => 'حدث خطاء ما الرجاء المحاولة لاحقا']);

        }
    }
    public function edit($id){
        $category = DesignerCategory::selection()->find($id);
        if (!$category){
            return redirect() ->route('admin.prof.categories')->with(['error' => 'هذا القسم غير موجود ']);
        }
        return view('admin.profcategories.edit' , compact('category'));
    }
    public function update(DesignerCategoryRequest $request , $id){
        try {
            $category = DesignerCategory::selection()->find($id);
            if (!$category){
                return redirect() ->route('admin.prof.categories')->with(['error' => 'هذا القسم غير موجود ']);
            }

            if (!$request ->has('category_active')){
                $request->request->add(['active' =>0]);
            }else{
                $request->request->add(['active' =>1]);

            }
            DesignerCategory::where('id' , $id)-> update([
                'name' => $request ->category_name,
                'active' => $request -> active

            ]);

            //save image

            if ($request ->has('photo')){
                $filePath = uploadImage('designerCategories',$request ->photo);
                DesignerCategory::where('id' , $id)->update([

                    'photo' => $filePath,


                ]);
            }

            return redirect() ->route('admin.prof.categories')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return redirect() ->route('admin.prof.categories')->with(['error' => 'حدث خطاء ما الرجاء المحاولة لاحقا']);

        }
    }

    public function destroy($id){
        try {
            $category= DesignerCategory::find($id);
            if (!$category){
                return redirect()->route('admin.prof.categories.edit' , $id)->with(["error" => "هذا القسم غير موجودو"]);
            }
            $category ->delete();



            return redirect()->route('admin.prof.categories')->with(["success" => "تم حذف القسم بنجاح"]);
        }catch (\Exception $ex){
            return redirect()->route('admin.prof.categories.edit')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }
    public function unactive($id){
        try {
            $category= DesignerCategory::find($id);
            if (!$category){
                return redirect()->route('admin.prof.categories.edit' , $id)->with(["error" => "هذا القسم غير موجودو"]);
            }

            $activeItem = $category -> active;
            if ($activeItem == 1){
                DesignerCategory::where('id' , $id)->update([

                    'active' => 0,


                ]);

            }


            return redirect()->route('admin.prof.categories')->with(["success" => "تم الغاء تفعيل  القسم بنجاح"]);
        }catch (\Exception $ex){
//return $ex;
            return redirect()->route('admin.prof.categories')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }
}
