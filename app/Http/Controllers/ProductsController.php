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

    public function show()
    {
        return view('products.show');
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
}
