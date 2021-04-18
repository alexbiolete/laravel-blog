<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;
use App\Category;
use App\Tag;
use App\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $posts = Post::all();
        $trashed_posts = Post::onlyTrashed()->get();
        return view('admin.dashboard')->with('users', $users)->with('categories', $categories)->with('posts', $posts)->with('trashed_posts', $trashed_posts);
    }
}
