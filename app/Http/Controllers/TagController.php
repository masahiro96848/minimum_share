<?php

namespace App\Http\Controllers;


use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', [
            'tags' => $tags
        ]);
    }
    public function show($name) 
    {
        $tag = Tag::where('name', $name)->first();

        return view('tags.show', [
            'tag' => $tag
        ]);
    }
}
