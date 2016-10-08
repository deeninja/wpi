<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UsersRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('admin.users.index', compact('users'));
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

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $form_data = $request->all();

        // check if file exists, if so, upload photo, create photo record & save it's id to the form request data.
        if( $file = $request->file('photo_id') ) {

            // create file name, file name prepended by current time
            $name = time() . $file->getClientOriginalName();

            // move the file $name to images folder
            $file->move('images', $name);

            // create new photo object with file name & saves it to the db
            $photo = Photo::create(['path'=>$name]);

            // assign the new photo object's db id to the forms request 'photo_id' property
            $form_data['photo_id'] = $photo->id;

        }

        // save form data with photo id (if photo exists), if not save form data without.

        // encrypt password for db
        $input['password'] = bcrypt($request->password);

        // if no image uploaded, create user without image
        User::create($form_data);


        // redirect user
        /*  return redirect('admin/users');*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
