<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteProductController extends Controller
{
    public function index(){
       $favorites =  Favorite::selection()->where('user_id','=',auth()->id())->get();
    return view('front.favorite.index',compact('favorites'));
    }
    public function add($id){
        try {
            if (!Favorite::where(['product_id'=>$id ,'user_id'=>auth()->id() ])->exists()){
                Favorite::create([
                    'product_id'=>$id,
                    'user_id' => auth()->id()
                ]);
                return back()->with(['success' => 'The Product Add to Favorite']);
            }
            return back()->with(['error' => 'This Product is in Favorite']);
        }catch (\Exception $exception){
            return back()->with(['error' => 'We Have AN Error Pleas Try Again Later']);
        }
    }
    public function destroy($id){

        try {
            $favorite =  Favorite::selection()->find($id);
            if (!$favorite){
                return redirect()->route('Favorite.show' , $id)->with(["error" => "We don't have this product"]);
            }
            $favorite ->delete();



            return redirect()->route('Favorite.show')->with(["success" => "The Product was deleted"]);
        }catch (\Exception $ex){
            return redirect()->route('Favorite.show')->with(["error" => "We Have AN Error Pleas Try Again Later"]);

        }
    }
}
