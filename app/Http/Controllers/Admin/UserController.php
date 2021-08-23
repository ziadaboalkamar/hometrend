<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
 public function index(){
     $users = User::selection() ->get();
     return view('admin.user.index',compact('users'));
 }

    public function destroy($id){
        try {
            $users= User::find($id);
            if (!$users){
                return redirect()->route('admin.users' , $id)->with(["error" => "هذا المنتج غير موجودو"]);
            }
            $users ->delete();



            return redirect()->route('admin.users')->with(["success" => "تم حذف المنتج بنجاح"]);
        }catch (\Exception $ex){
            return redirect()->route('admin.users')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }
    public function unactive($id){
        try {
            $users= User::find($id);
            if (!$users){
                return redirect()->route('admin.users' , $id)->with(["error" => "هذا المنتج غير موجودو"]);
            }

            $activeUsert = $users -> active;
            if ($activeUsert == 1){
                User::where('id' , $id)->update([

                    'active' => 0,


                ]);

            }


            return redirect()->route('admin.users')->with(["success" => "تم الغاء تفعيل  القسم بنجاح"]);
        }catch (\Exception $ex){
//return $ex;
            return redirect()->route('admin.users')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }
}
