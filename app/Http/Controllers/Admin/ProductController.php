<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(){
      $products =  Product::selection()->get();
      return view('admin.product.index' , compact('products'));
   }
   public function create(){
       $categories =  Category::selection()->active()->get();
       return view('admin.product.create' ,compact('categories'));

   }
    public function store(ProductRequest $request){

        try {
            if(!$request->has('active')){
                $request ->request->add(["active" => "0"]);
            }else{
                $request ->request->add(["active" => "1"]);

            }
            $filePath = '';
            if ($request ->has('photo')){
                $filePath = uploadImage('products',$request ->photo);

            }
            if ($request->hasFile('image')){
            $image = array();
            if ($files = $request->file('image')){
                foreach ($files as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = strtolower($file -> getClientOriginalExtension());
                    $image_full_name = $image_name .'.' . $ext;
                    $upload_path ='assets/images/products/';
                    $image_url = $upload_path.$image_full_name;
                    $file ->move($upload_path , $image_full_name);
                    $image[] = $image_url;

                }
//                Product::insert([
//                    'gallery' => implode('|' , $image)
//                ]);
            }
            }

//            if($request->hasfile('image'))
//            {
//
//                foreach($request->file('image') as $image)
//                {
//                    $name=$image->getClientOriginalName();
//                    $upload_path ='assets/images/products/';
//                    $image_name = md5(rand(1000,10000));
//                    $ext = strtolower($image -> getClientOriginalExtension());
//                    $image_full_name = $image_name .'.' . $ext;
//                    $image_url = $upload_path.$image_full_name;
//                    $image->move($upload_path , $image_full_name);
//                    $data[] =  $image_url;
//                }
//
//            }



            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'size' => $request->size,
                'category_id' => $request->category_id,
                'active' => $request -> active ,
                'photo' => $filePath,
                'details' => $request->description,
                'gallery' => implode('|' , $image)


            ]);

            return redirect()->route("admin.products")->with(["success" => 'تم اضافة المنتج بنجاح']);

        }catch (\Exception $ex){

            return redirect()->route("admin.products")->with(["error" => 'حدث خطاء ما يرجا المحاولة لاحقا']);
        }
    }
    public function edit($id){

       $product = Product::selection()->find($id);

        $categories =  Category::selection()->active()->get();
        $images = explode('|', $product->gallery);
        if (!$product){
            return redirect() ->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);
        }

        return view('admin.product.edit' , compact('product','categories' , 'images'));
    }
    public function update($id , ProductRequest $request){
        try {
            $product = Product::selection()->find($id);
            if (!$product){
                return redirect() ->route('admin.products')->with(['error' => 'هذا المنتج غير موجود ']);
            }
            if(!$request->has('active')){
                $request ->request->add(["active" => "0"]);
            }else{
                $request ->request->add(["active" => "1"]);

            }
            $filePath = '';
            if ($request ->has('photo')){
                $filePath = uploadImage('products',$request ->photo);
                Product::where('id' , $id) -> update([
                    'photo' => $filePath,
                ]);
            }
            Product::where('id' , $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'size' => $request->size,
                'category_id' => $request->category_id,
                'active' => $request -> active ,
                'details' => $request->description

            ]);
            return redirect()->route("admin.products")->with(["success" => 'تم تعديل المنتج بنجاح']);



        }catch (\Exception $ex){
            return redirect()->route("admin.products")->with(["error" => 'حدث خطاء ما يرجا المحاولة لاحقا']);

        }

}

public function destroy($id){
    try {
        $product= Product::find($id);
        if (!$product){
            return redirect()->route('admin.products' , $id)->with(["error" => "هذا المنتج غير موجودو"]);
        }
        $product ->delete();



        return redirect()->route('admin.products')->with(["success" => "تم حذف المنتج بنجاح"]);
    }catch (\Exception $ex){
        return redirect()->route('admin.products')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

    }
}
public function unactive($id){
    try {
     $product= Product::find($id);
        if (!$product){
            return redirect()->route('admin.products' , $id)->with(["error" => "هذا المنتج غير موجودو"]);
        }

        $activeProduct = $product -> active;
        if ($activeProduct == 1){
            Product::where('id' , $id)->update([

                'active' => 0,


            ]);

        }


        return redirect()->route('admin.products')->with(["success" => "تم الغاء تفعيل  القسم بنجاح"]);
    }catch (\Exception $ex){
//return $ex;
        return redirect()->route('admin.products')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

    }
}
}
