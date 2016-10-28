<?php

namespace App\Http\Controllers;

// requests
use App\AboutSection;
use App\Category;
use App\Country;
use App\Photo;
use App\Post;
use App\Role;
use App\Comment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UserProfileUpdate;

// models
use App\Conference;
use App\Play;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

// controllers
/*use App\Http\Controllers\Conferences;*/

class PagesController extends Controller
{

    /* show home page
    ----------------------------------------------------------------------------------------------*/
    public function index()
    {
        return view('index');
    }


    /*---------------------------------------------------------------------------------------------------------------------

                                                     | conferences |

    ----------------------------------------------------------------------------------------------------------------------*/

    /* show conferences listing page
    ----------------------------------------------------------------------------------------------*/
    public function conferences()
    {
        $conferences = Conference::all();

        $current_year = substr(Carbon::now(), 0, 4);

        return view('conferences', compact('conferences', 'current_year'));
    }

    /* show individual conference
    ----------------------------------------------------------------------------------------------*/
    public function show_conference($id)
    {
        $conference = Conference::findOrFail($id);

        $current_year = substr(Carbon::now(), 0, 4);

        return view('conference-view', compact('conference', 'current_year'));
    }

    /* show individual conference's related plays listing
    ----------------------------------------------------------------------------------------------*/
    public function show_conference_plays($id)

    {

        // get current conference (in url) record
        $conference = Conference::findOrFail($id);

        // go to the conference related plays table, & get all plays with conference id matching $id in get request.
        $conference_plays = $conference->plays()->where('conference_id', $id)->get();

        return view('conference-view-plays', compact('conference_plays', 'conference'));

    }

    /* show individual conference's related individual play
    ----------------------------------------------------------------------------------------------*/
    public function show_related_play($id)
    {
        // get play from id (in get uri from button)
        $play = Play::findOrFail($id);

        return view('play', compact('play'));
    }


    /*---------------------------------------------------------------------------------------------------------------------

                                                       | about |

    ----------------------------------------------------------------------------------------------------------------------*/

    /* show members page
    ----------------------------------------------------------------------------------------------*/
    public function members()
    {
        $members = User::all();
        return view('members', compact('members'));

    }

    public function member_view($id)
    {
        $member = User::findOrFail($id);
        return view('member-view', compact('member'));
    }


    /*---------------------------------------------------------------------------------------------------------------------

                                                      | members |

   ----------------------------------------------------------------------------------------------------------------------*/
    /* show about page
       ----------------------------------------------------------------------------------------------*/
    public function about()
    {
        $about = AboutSection::findOrFail(1);
        return view('about', compact('about'));

    }



    /*---------------------------------------------------------------------------------------------------------------------

                                                       | blog |

    ----------------------------------------------------------------------------------------------------------------------*/

    /* show blog page
   ----------------------------------------------------------------------------------------------*/
    public function blog()
    {
        $posts = Post::all();

        $categories = Category::all()->keyBy('id', 'name');

        /*dd($categories);*/
        return view('blog', compact('posts', 'categories'));

    }

    /* show posts by category
   ----------------------------------------------------------------------------------------------*/
    public function posts_by_category($id)
    {
        // get all posts
        $posts = Post::all();

        // get all posts with the id matching the category id in uri
        $category_posts = $posts->where('category_id', $id);

        // get all categories
        $categories = Category::all()->keyBy('id', 'name');

        // get the category collection matching $id, then extract the first array in the collection (which is the record).
        $current_category = $categories->where('id', $id)->first();

        return view('category-posts', compact('category_posts', 'categories', 'current_category'));

    }

    /* show individual post
    ----------------------------------------------------------------------------------------------*/
    public function show_post($id)
    {
        $post = Post::findOrFail($id);

        $comments = Comment::all();

        $post_comments = $comments->where('post_id',$id);

        // if user has a photo, get photo for showing, else get only post data without photo
        if( $post->user->photo_id ) {

            // get authors user photo id
            $author_photo_id = $post->user->photo_id;

            // get the photo record matching that id
            $user_photo = Photo::findOrFail($author_photo_id);

            $comments = Comment::all();

            $post_comments = $comments->where('post_id',$id);

            return view('post-view', compact('post', 'post_comments', 'user_photo'));
        }




        return view('post-view', compact('post', 'post_comments'));

    }

    /*---------------------------------------------------------------------------------------------------------------------

                                                       | contact |

    ----------------------------------------------------------------------------------------------------------------------*/

    /* show contact page
    ----------------------------------------------------------------------------------------------*/
    public function contact()
    {
        return view('contact');
    }

    /* validate & send email
       ----------------------------------------------------------------------------------------------*/
    public function post_contact(Request $request)
    {
        // validate
        $this->validate($request,
        [
        'first_name' => 'required|min:2',
        'email' => 'required|email',
        'message' => 'required|min:10' ]);

        // Mail:: takes the request and assigns it to a variable with the name of the key
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'body_message' => $request->message
            );

        // email (view/email, data to put in email, what to use in header data)
        Mail::send('emails.contact', $data, function($message) use ($data) {

            $message->from($data['email']);
            $message->to('willyam89@gmail.com');
            $message->subject($data['subject']);

        });
    }

    /*---------------------------------------------------------------------------------------------------------------------

                                                     | user profile |

    ----------------------------------------------------------------------------------------------------------------------*/

    /* show profile page
    ----------------------------------------------------------------------------------------------*/
    public function profile()
    {
        $user = Auth::user();

        return view('user-profile', compact('user'));
    }

    /* show edit profile page
    ----------------------------------------------------------------------------------------------*/
    public function profile_edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        $countries = Country::all()->pluck('name');

        return view('user-profile-edit', compact('user','countries'));
    }

    /* update profile page
   ----------------------------------------------------------------------------------------------*/
    public function profile_update(UserProfileUpdate $request, $id)
    {

        // find current users record
        $user = User::findOrFail($id);

        // if pw field is empty, extract all form data except password to $form_data
        if( $request->password == '' || $request->password_confirmation == '' ) {

            $form_data = $request->except([ 'password', 'password_confirmation' ]);

        } else {

            $form_data = $request->all();
            // encrypt password for db
            $form_data['password'] = bcrypt($request->password);
            $form_data['password_confirmation'] = bcrypt($request->password_confirmation);

        }


        // if file uploaded, upload it, create photo tbl record & assign it to form data, then save form data in user field.
        if( $file = $request->file('photo_id') ) {

            // create file name
            $name = time() . '-' . $file->getClientOriginalName();

            // move uploaded file to images dir
            $file->move('images/users', $name);

            // create photo record/object with path name
            $photo = Photo::create([ 'path' => $name ]);

            // assign form images input value the new photo record's id
            $form_data['photo_id'] = $photo->id;

        }

        // update user with form data.
        $user->update($form_data);

        Session::flash('profile_updated', 'Your profile has been updated successfully!');

        return view('user-profile', compact('user'));
    }

}