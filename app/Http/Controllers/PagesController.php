<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        // $first_post = Post::orderBy('created_at', 'asc')->first();
        // $second_post = Post::orderBy('created_at', 'asc')->skip(1)->take(1)->get()->first();
        $last_post = Post::orderBy('created_at', 'desc')->first();
        return view('index')->with('settings', Setting::first())->with('categories', Category::all())->with('posts', $posts)->with('last_post', $last_post);
    }
}
