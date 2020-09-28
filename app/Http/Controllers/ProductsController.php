<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Tag;
use App\Category;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Abraham\TwitterOAuth\TwitterOAuth;

class ProductsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:update, Product')->only('update');
    // }

    public function index()
    {
        // $user = User::where('id')->get();
        $products = Product::paginate(12);
        // $products = Product::all()->sortByDesc('created_at')->paginate(12);
        
        return view('products.index',[
            'products' => $products,
        ]);
    }

    public function show($p_id)
    {
        $product = Product::find($p_id);
        $user = Auth::user();
        $user_img = Auth::id();
        $comment = $product->comments();
        $comments = $product->comments()->get()->sortByDesc('created_at');
        $comment_count = $product->comments()->get()->count();
        return view('products.show', [
            'product' => $product,
            'user' => $user,
            'comment' => $comment,
            'comments' => $comments,
            'comment_count' => $comment_count,
        ]);
    }

    public function new()
    {
        $user = Auth::user();
        $categories = Category::all();
        $allTagNames = Tag::all()->map(function($tag) {
            return [
                'text' => $tag->name,
            ];
        });
        return view('products.new', [
            'allTagNames' => $allTagNames,
            'categories' => $categories,
        ]);
    }

    public function create(ProductRequest $request)
    {
        $user = Auth::user();
        $product = Product::create([
            'photo' => $request->file('photo'),
            'title' => $request->title,
            'review' => $request->review,
            'user_id' => $request->user()->id,
            'category_id' => $request->category_id,
        ]);
        // $filename = $request->file('photo')->store('public');
        // $product->photo = str_replace('public', '', $filename);
        // s3アップロード開始
        $image = $request->file('photo');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->put('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $product->photo = Storage::disk('s3')->url($path);

        $product->save();

        $request->tags->each(function ($tagName) use ($product) {
            $tag = Tag::firstOrCreate([
                'name' => $tagName,
            ]);
            $product->tags()->attach($tag);
        });

        return redirect()->route('products.index');
    }

    public function edit($product_id)
    {
        $product = Product::find($product_id);
        $categories = Category::all();
        $this->authorize('update', $product);
        $tagNames = $product->tags->map(function($tag) {
            return [
                'text' => $tag->name
            ];
        });

        $allTagNames = Tag::all()->map(function($tag) {
            return [
                'text' => $tag->name,
            ];
        });

        return view('products.edit', [
                'product' => $product,
                'categories' => $categories,
                'tagNames' => $tagNames,
                'allTagNames' => $allTagNames,
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
        
        $product->update([
            'photo' => $request->file('photo'),
            'title' => $request->title,
            'review' => $request->review,
            'category_id' => $request->category_id,
        ]);
        // $product->title = $request->title;
        // $product->review = $request->review;
        // $product->price = $request->price;
        // $product->url = $request->url;
        // $product->user_id = $request->user()->id;

        // $filename = $request->file('photo')->store('public');
        // $product->photo = str_replace('public', '', $filename);
        $image = $request->file('photo');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->put('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $product->photo = Storage::disk('s3')->url($path);
        $product->save();

        $product->tags()->detach();
        $request->tags->each(function($tagName) use($product) {
            $tag =  Tag::firstOrCreate([
                'name' => $tagName,
            ]);
            $product->tags()->attach($tag);
        });
        

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $this->authorize('update', $product);
        $product->delete();

        return redirect()->route('products.index');
    }
    
    public function like(Request $request, Product $product) 
    {
        $product->likeProducts()->detach($request->user()->id);
        $product->likeProducts()->attach($request->user()->id);

        return [
            'id' => $product->id,
            'countLikes' => $product->count_likes,
        ];
    }

    public function unlike(Request $request, Product $product) 
    {
        $product->likeProducts()->detach($request->user()->id);

        return [
            'id' => $product->id,
            'countLikes' => $product->count_likes,
        ];
    }

    public function tweet(Request $request)
    {
        $twitter = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_ACCESS_SECRET')
        );
        
        $twitter->post("statuses/update", [
            "status" =>
            
            'New Photo Post!' . PHP_EOL .
            '新しい聖地の写真が投稿されました!' . PHP_EOL .
            'タイトル「' . $title . '」' . PHP_EOL .
            '#photo #anime #photography #アニメ #聖地 #写真 #HolyPlacePhoto' . PHP_EOL .
            'https://minimum-share.app/product' . $id
        ]);
    }
}
