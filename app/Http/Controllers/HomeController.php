<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $posts = DB::table('users')->leftjoin('posts', 'users.id', '=', 'posts.author')->paginate(10);
        return view('home',['posts' => $posts]);
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
    
    public function getPost($id){
        $post = Post::find($id);
        return view("post/post_detail",array("post"=>$post));
    }

}
