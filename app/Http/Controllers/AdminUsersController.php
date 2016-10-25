<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Photo;
use App\Country;

use App\Http\Requests;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get logged in/auth'd user.
        $user = Auth::user();

        // if user is admin && active, redirect to users with user data.
        if ($user->isAdmin()){
        $users = User::all();
        return view('admin.users.index', compact('users'));
        }

        // else redirect home.
        return redirect('/home');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // get all the name, id attributes from the roles class / table
        $roles = Role::all()->pluck('name', 'id');

        // get all the name, id attributes from the countries class / table
        $countries = Country::pluck('name','id');

        // get the status & id columns
        $status = User::pluck('status', 'id')->all();


        return view('admin.users.create', compact('roles', 'status','countries'));
    }

    /**
     * store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        // if pw after trim is empty, extract all form data except password to $form_data
        if(trim($request->password) == ''){

            $form_data = $request->except('password');

            } else {

                // save form data with all fields
                $form_data = $request->all();

            }

        // check if file exists, if so, upload photo, create photo record & save it's id to the form request data.
        if( $file = $request->file('photo_id') ) {

            // create file name, file name prepended by current time
            $name = time() . '-' . $file->getClientOriginalName();

            // move the file $name to images folder
            $file->move('images/users', $name);

            // create new photo object with file name & saves it to the db
            $photo = Photo::create([ 'path' => $name ]);

            // assign the new photo object's db id to the forms request 'photo_id' property
            $form_data['photo_id'] = $photo->id;

        }

        // encrypt password for db
        $form_data['password'] = bcrypt($request->password);

        // create user
        User::create($form_data);

        return redirect('admin/users');

    }

    /**
     * display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get user matching id in get url
        $user = User::findOrFail($id);

        // get all the name & id attributes from the roles entity
        $roles = Role::pluck('name', 'id')->all();

        // get all the name, id attributes from the countries class / table
        $countries = Country::pluck('name','id');

        return view('admin.users.edit', compact('user','roles','countries'));
    }

    /**
     * update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        // find current users record
        $user = User::findOrFail($id);

        // if pw after trim is empty, extract all form data except password to $form_data
        if(trim($request->password) == ''){

            $form_data = $request->except('password');

            } else {

                // save form data with all fields
                $form_data = $request->all();

            }

        // if file uploaded, upload it, create photo tbl record & assign it to form data, then save form data in user field.
        if($file = $request->file('photo_id')){

            // create file name
            $name = time() . '-' . $file->getClientOriginalName();

            // move uploaded file to images dir
            $file->move('images/users', $name);

            // create photo record/object with path name
            $photo = Photo::create(['path'=>$name]);

            // assign form images input value the new photo record's id
            $form_data['photo_id'] = $photo->id;

        }

        // if checkbox value exists/checked, make form data "Active", else if it doesn't exist/not checked -> "Inactive".
        if (isset($form_data['status'])) {

            $form_data['status'] = "Active";

        } else {

            $form_data['status'] = "Inactive";

        }



        // encrypt password for db
        $form_data['password'] = bcrypt($request->password);



        // update user with form data.
        $user->update($form_data);

        Session::flash('updated_message', 'The user has been updated.');

        return redirect('/admin/users');

    }

    /**
     * remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find user.
        $user = User::findOrFail($id);

        // destroy related image.
        unlink(public_path() . '\\images\users\\' .  $user->photo->path);

        // delete user record.
        $user->delete();

        // create flash deleted notif
        Session::flash('deleted_user', 'User deleted successfully.');

        return redirect('admin/users');
    }
}
