<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
   public function index(){
       $categories=Category::selection()->get();
       return view('front.include.navbar',compact('categories'));
   }
   public function showProduct($id){
       $categories=Category::selection()->find($id);
       $products = Product::selection()->where('category_id','=' , $id)->get();
return view('front.categories.products',compact('categories' , 'products'));
   }

   public function productPage($id){
       $product = Product::selection()->find($id);
       $images = explode('|', $product->gallery);
        $comments = Comment::selection()->where('product_id','=',$id)->get();

       return view('front.categories.productspage',compact( 'product','images','comments'));

   }
}
