<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrfail();
        $posts = $tag->posts()->orderBy('id', 'desc')->paginate(2);

        return view('tags.show', compact('tag', 'posts'));

    }
}
