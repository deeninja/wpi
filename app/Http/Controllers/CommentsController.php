<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\PublicCommentRequest;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::all();

        /*   foreach($comments as $comment) {
               $author = $comment->user;

           }*/

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicCommentRequest $request)
    {

        $form_data = $request->all();

        $comment = Comment::create($form_data);

        // set commenting user's id to the id in form (Auth::user())
        $comment->user_id = $form_data['user_id'];

        $comment->save();

        // get relevant post for redirecting to it's view
        $post = Post::findOrFail($form_data['post_id']);

        Session::flash('comment_success', 'Comment successful.');

        return Redirect::route('post.show',$post->id);

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        $author = $comment->user;

        return view('admin.comments.show', compact('comment', 'author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comments = Comment::all();

        $comment->delete();

        Session::flash('deleted_comment', 'The comment was successfully deleted.');

        return view('admin.comments.index', compact('comment', 'comments'));
    }
}