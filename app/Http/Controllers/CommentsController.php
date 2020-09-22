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

    public function edit($p_id, $c_id)
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        $comment = Comment::where('id', $c_id)->first();
        $product = Product::where('id', $p_id)->first();

        if(Auth::id() !== $comment->user_id) {
            return redirect()->route('products.show', [
                'id' => $product->id,
            ]);
        }

    
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        
        if(Auth::id() === $product->user_id) {
            return redirect()->route('products.show', ['id' => $product->id]);
        }

        return view('comments.edit', [
            'product' => $product,
            'comment' => $comment,
        ]);
    }

    public function update(CommentRequest $request, $p_id, $c_id)
    {
        $product = Product::find($p_id);
        $comment = Comment::where('id', $c_id)->first();
        
        
        $comment->update([
            'title' => $request->title,
            'star' => $request->star,
            'body' => $request->body,
        ]);

        return redirect()->route('products.show', [
            'id' => $product->id,
        ]);
    }

    public function destroy($p_id, $c_id)
    {
        $product = Product::where('id', $p_id)->first();
        $comment = Comment::where('id', $c_id)->first();
        $comment->delete();

        return redirect()->route('products.show',[
            'id' => $product->id,
        ]);
    }
}
