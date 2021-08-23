<?php

use Illuminate\Support\Facades\Config;

function get_default_lang(){
    return Config::get('app.locale');
}


function get_category_designer($id){
      $category = App\Models\DesignerCategory::selection()->find($id);
      return $category->name;
}

function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    $image ->move($path,$image);
    return $path;
}



