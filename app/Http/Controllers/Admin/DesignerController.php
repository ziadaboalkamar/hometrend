<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use App\User;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
  public function index(){
    $designers =   Designer::join('users', function ($join) {
              $join->on('designers.id', '=', 'users.designers_id')
                  ->where('users.designers_id', '!=', null);
          })
          ->get();

//      $designers = Designer::selection()->get();

      return view('admin.designer.index' ,compact('designers'));
  }


    public function destroy($id){
        try {
            $designers =   Designer::join('users', function ($join) {
                $join->on('designers.id', '=', 'users.designers_id')
                    ->where('users.designers_id', '!=', null);
            })
                ->find($id);
            if (!$designers){
                return redirect()->route('admin.designers' , $id)->with(["error" => "هذا المنتج غير موجود"]);
            }
            $designers ->delete();



            return redirect()->route('admin.designers')->with(["success" => "تم حذف المنتج بنجاح"]);
        }catch (\Exception $ex){
            return redirect()->route('admin.designers')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }
    public function unactive($id){
        try {
            $product= Designer::find($id);
            if (!$product){
                return redirect()->route('admin.designers' , $id)->with(["error" => "هذا المنتج غير موجودو"]);
            }

            $activeProduct = $product -> active;
            if ($activeProduct == 1){
                Designer::where('id' , $id)->update([

                    'active' => 0,


                ]);

            }


            return redirect()->route('admin.designers')->with(["success" => "تم الغاء تفعيل  القسم بنجاح"]);
        }catch (\Exception $ex){
//return $ex;
            return redirect()->route('admin.designers')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }
}
