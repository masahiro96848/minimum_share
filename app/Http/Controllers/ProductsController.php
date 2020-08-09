<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:update, Product')->only('update');
    // }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('products.index',[
            'products' => $products,
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', [
            'product' => $product,
        ]);
    }

    public function new()
    {
        return view('products.new');
    }

    public function create(ProductRequest $request, Product $product)
    {
        $product->title = $request->title;
        $product->review = $request->review;
        $product->price = $request->price;
        $product->url = $request->url;
        $product->user_id = $request->user()->id;

        // $filename = $request->file('photo')->store('public');
        // $product->photo = str_replace('public', '', $filename);
        // s3アップロード開始
        $image = $request->file('photo');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->put('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $product->photo = Storage::disk('s3')->url($path);

        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        // $this->authorize('update', $product);
        // if(Auth::id() !== $product->user_id) {
            //     return redirect()->route('products.index');
        // } else {
            //     // $product = Product::find($id);
            //     return view('products.edit', [
                //         'product' => $product
                
                //     ]);  
                // }
        $product = Product::find($id);
        $this->authorize('update', $product);
        return view('products.edit', [
                'product' => $product
            ]);  
    }

    /**
     * 指定したポストの更新
     *
     * @param  Request  $request
     * @param  Product  $product
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function update(ProductRequest $request, Product $product, int $id)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);
        
        $product = Product::find($id);
        $product->title = $request->title;
        $product->review = $request->review;
        $product->price = $request->price;
        $product->url = $request->url;
        $product->user_id = $request->user()->id;

        // $filename = $request->file('photo')->store('public');
        // $product->photo = str_replace('public', '', $filename);
        $image = $request->file('photo');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->put('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $product->photo = Storage::disk('s3')->url($path);
        $product->save();
        

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);
        $product->delete();

        return redirect()->route('products.index');
    }
    
}
