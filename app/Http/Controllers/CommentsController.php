<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function new($id) 
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        
        $product = Product::find($id);
        return view('comments.new', [
            'product' => $product
        ]);
    }

    public function create(CommentRequest $request, $id)
    {
       

        $exists = Comment::where('user_id', $request->user()->id)
                        ->where('product_id', $request->product_id)->first();

        if(isset($exists)) {
            return redirect()->route('products.index');
        }
        


        
        
        $product = Product::find($id);
        $product->comments()->create([
            'title' => $request->title,
            'star' => $request->star,
            'body' => $request->body,
            'user_id' => $request->user()->id,
            // 'product_id' => $request->product()->id,
        ]);

        


        return redirect()->route('products.show', [
            'id' => $product->id,
        ]);
    }
}
