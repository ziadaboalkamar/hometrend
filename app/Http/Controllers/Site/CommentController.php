<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
public function addProductComment(Request $request ,$id){
if ($request->message == null){
    return redirect()->route('category.product.page',$id)->with(['error' => 'You should add a comment']);
}else{
    Comment::create([
        'user_id' => $request->user_id,
        'product_id' => $id,
        'message' => $request->message
    ]);
    return redirect()->route('category.product.page',$id)->with(['success' => 'Comment Add Successfully']);
}

}
public function addDesignerComment(Request $request ,$id){

    if ($request->message == null){
        return redirect()->back()->with(['error' => 'You should add a comment']);
    }else{
        Comment::create([
            'user_id' => $request->user_id,
            'designer_id' => $id,
            'message' => $request->message
        ]);
        return redirect()->back()->with(['success' => 'Comment Add Successfully']);
    }

}

}
