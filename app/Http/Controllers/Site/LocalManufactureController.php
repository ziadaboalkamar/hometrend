<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Local;
use App\Models\Wood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalManufactureController extends Controller
{
  public function index(){

  $woods = Wood::selection()->get();
  return view('front.localmanufactor.local',compact('woods'));
  }
  public function store(Request $request){
      try {

          $id = Auth::user()->id;
//      return $request;
          $filePath = '';
          if ($request ->has('photo')){
              $filePath = uploadImage('local',$request->photo);

          }

          if ($request->hasFile('gallery')){
              $image = array();
              if ($files = $request->file('gallery')){
                  foreach ($files as $file){
                      $image_name = md5(rand(1000,10000));
                      $ext = strtolower($file -> getClientOriginalExtension());
                      $image_full_name = $image_name .'.' . $ext;
                      $upload_path ='assets/images/local/';
                      $image_url = $upload_path.$image_full_name;
                      $file ->move($upload_path , $image_full_name);
                      $image[] = $image_url;

                  }
              }
          }

          Local::create([
              'name' => $request->name,
              'wood' => $request->wood,
              'length' => $request->length,
              'width' => $request->width,
              'color' => $request->color,
              'phone' => $request->phone,
              'details' => $request->details,
              'user_id' => $id,
              'photo' =>$filePath,
              'gallery' => implode('|' , $image)

          ]);
          return redirect()->route("local.show")->with(["success" => 'The project has been successfully added ']);

      }catch (\Exception $ex){

          return redirect()->route("local.show")->with(["error" => 'There is something wrong']);
      }
  }
}
