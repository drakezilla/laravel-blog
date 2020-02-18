<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }

    public function getPostForm() {
        return view('post/post_form');
    }

    public function createPost(Request $request) {
        $post = Post::create(array(
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'author' => Auth::user()->id
        ));
        return redirect()->route('home')->with('success', 'Post has been successfully added!');
    }

}
