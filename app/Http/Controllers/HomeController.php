<?php

namespace App\Http\Controllers;

use App\Conference;
use App\Play;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Post;
use App\Gallery;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = count(Comment::all());
        $users = count(User::all());
        $posts = count(Post::all());
        $galleries = count(Gallery::all());
        $conferences = count(Conference::all());
        $plays = count(Play::all());

        return view('admin.index', compact('comments','users','posts','galleries','conferences','plays'));
    }

    public function home()
    {
        $user = Auth::user();
        return view('home',compact('user'));
    }
}
