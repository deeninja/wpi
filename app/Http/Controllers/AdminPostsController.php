<?php


namespace App\Http\Controllers;


// models
use App\Category;
use App\Post;
use App\Photo;

// requests
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // get posts
            $posts = Post::all();
            return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostEditRequest $request)
    {
        // get form data
        $form_data = $request->all();

        // if image uploaded, format image name, move image to folder, create photo ei / record, assign it's id to form data
        if($file = $request->file('photo_id')) {

            // format
            $file_name = time() . '-' . $file->getClientOriginalName();

            // move
            $file->move('images/posts', $file_name);

            // create record
            $photo = Photo::create(['path'=>$file_name]);

            // assign new photo records id to form request photo property
            $form_data['photo_id'] = $photo->id;

        }

        // create new post
        $new_post = Post::create($form_data);

        // assign posts category id, the category id in the select field.
        $new_post->category_id = $form_data['category_id'];

        // get current user
        $user = Auth::user();

        $new_post->user_id = $user->id;

        $new_post->save();

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get post matching url id
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get post matching url id
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id');

        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        // get form data
        $form_data = $request->all();

        // get record to update
        $post_record = Post::findOrFail($id);

        // assign posts category id, the category id in the select field.
        if(isset($form_data['category_id'])){
            $post_record->category_id = $form_data['category_id'];
        }

        // if file uploaded, create name, move file, create record, add record id to form data id.
        if($file = $request->file('photo_id')){

            $file_name = time() . '-' . $file->getClientOriginalName();

            $file->move('images/posts', $file_name);

            $new_photo = Photo::create(['path'=> $file_name]);

            $form_data['photo_id'] = $new_photo->id;




        }

        $post_record->update($form_data);

        $posts = Post::all();

        // create notification
        Session::flash('post_updated', 'Post updated successfully!');

        return view('admin.posts.index',compact('posts'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // destroy related image.
        unlink(public_path() . '\\images\posts\\' .  $post->photo->path);

        //
        Session::flash('post_deleted', "Post deleted successfull.");

        $post->delete();


        return redirect('admin/posts');

    }
}
