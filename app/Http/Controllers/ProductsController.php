<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();


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

        $filename = $request->file('photo')->store('public');
        $product->photo = str_replace('public', '', $filename);
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit( $id )
    {
        $product = Product::find($id);
        return view('products.edit',[
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, int $id)
    {

        $product = Product::find($id);
        $product->title = $request->title;
        $product->review = $request->review;
        $product->price = $request->price;
        $product->url = $request->url;
        $product->user_id = $request->user()->id;

        $filename = $request->file('photo')->store('public');
        $product->photo = str_replace('public', '', $filename);
        $product->save();
        

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('products.index');
    }
    
}
