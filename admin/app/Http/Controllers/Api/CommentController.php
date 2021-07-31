<?php
namespace App\Http\Controllers\Api;

use App\Entity\Comment;
use App\Entity\Order;
use Illuminate\Support\Facades\DB;
use App\Entity\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Components\Controller;

class CommentController extends Controller{
    public function SaveComment(Request $request){
        $comment=new Comment();
        $comment->user_id=$request->user_id;
        $comment->product_id=$request->product_id;
        $comment->contact=$request->contact;
        $res=$comment->save();
        if ($res) {
            $order = Order::updated('state', '3')->where('id', $request->order_id)->first();
            return $order;
        }

    }
    public function GetComment(Request $request){
        $comment=Comment::all();
        return $comment;
    }
}