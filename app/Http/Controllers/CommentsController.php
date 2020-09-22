<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use App\Rules;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function new($p_id) 
    {
    
        $product = Product::where('id', $p_id)->first();
    
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        
        if(Auth::id() === $product->user_id) {
            return redirect()->route('products.show', ['id' => $product->id]);
        }
        
        
        
        return view('comments.new', [
            'product' => $product
        ]);
    }

    public function create(CommentRequest $request, $id)
    {
        $product = Product::find($id);
        // $request->validate([
        //     'product_id' => [
        //         'required',
        //         'exists:products,id',
        //         function($attribute, $value, $fail) use($request)  {
        //              // ログインしてるかチェック
        //             if(!auth()->check()) {

        //                 $fail('レビューするにはログインしてください。');
        //                 return;

        //             }
        //             $exists = Comment::where('user_id', $request->user()->id)
        //                             ->where('product_id', $request->id)
        //                             ->exists();
                    
        //             if($exists) {
        //                 $fail('すでにコメントは投稿済みです。');
        //                 return;
        //             }
        //         }
        //     ],
        // ]);

        $product->comments()->create([
            'title' => $request->title,
            'star' => $request->star,
            'body' => $request->body,
            'user_id' => $request->user()->id,
            
        ]);


        return redirect()->route('products.show', [
            'id' => $product->id,
        ]);
    }
}
