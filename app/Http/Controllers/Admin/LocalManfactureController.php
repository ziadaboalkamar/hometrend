<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Local;
use App\User;
use Illuminate\Http\Request;

class LocalManfactureController extends Controller
{
    public function index(){
        $products =  Local::selection()->get();

        return view('admin.Local.index' , compact('products'));
    }
    public function destroy($id){
        try {
            $product= Local::find($id);
            if (!$product){
                return redirect()->route('admin.local' , $id)->with(["error" => "هذا المنتج غير موجودو"]);
            }
            $product ->delete();



            return redirect()->route('admin.local')->with(["success" => "تم حذف المنتج بنجاح"]);
        }catch (\Exception $ex){
            return redirect()->route('admin.local')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }
    public function showGallery($id){
        $products =  Local::selection()->find($id);
        $images = explode('|', $products->gallery);
        return view('admin.Local.gallery' , compact('products','images'));
    }
}
