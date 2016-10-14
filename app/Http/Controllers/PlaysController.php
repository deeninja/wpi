<?php

namespace App\Http\Controllers;

// models
use App\Photo;
use App\Play;
use App\Conference;


// requests
use App\Http\Requests\PlaysAddRequest;
use App\Http\Requests\PlaysEditRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class PlaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plays = Play::all();

        return view('admin.plays.index', compact('plays'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all conference records title's & id's
        $conferences = Conference::pluck('title','id');


        return view('admin.plays.create', compact('conferences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaysAddRequest $request)
    {
        // get form data
        $form_data = $request->all();

        // if image uploaded, format image name, move image to folder, create photo ei / record, assign it's id to form data
        if($file = $request->file('photo_id')) {

            // format
            $file_name = time() . '-' . $file->getClientOriginalName();

            // move
            $file->move('images/plays', $file_name);

            // create record
            $photo = Photo::create(['path'=>$file_name]);

            // assign new photo records id to form request photo property
            $form_data['photo_id'] = $photo->id;

        }

        // create new play
        $new_play = Play::create($form_data);

        // get selected conference
        $conference = Conference::findOrFail($form_data['conference_id']);

        // go to conference related plays table & relate the new play to the conference id in the pivot table
        $conference->plays()->save($new_play);

        return redirect('admin/plays');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $play = Play::findOrFail($id);

        /*dd($play->conferences);*/
        return view('admin.plays.show', compact('play'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $play = Play::findOrFail($id);

        $conferences = Conference::pluck('title', 'id');

        return view('admin.plays.edit',compact('play','conferences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaysEditRequest $request, $id)
    {
        // get play matching uri id
        $play = Play::findOrFail($id);

        // get form data
        $form_data = $request->all();

        // if photo uploaded, create file name, move to images/plays dir, create record, assign record id to form data id
        if($file = $request->file('photo_id')){

            $file_name = time() . '-' . $file->getClientOriginalName();

            $file->move('images/plays', $file_name);

            $photo = Photo::create(['path'=> $file_name]);

            $form_data['photo_id'] = $photo->id;

        }

        $play->update($form_data);

        $play->conferences()->sync(['conference_id'=>$form_data['conference_id']]);

        //User::find(1)->roles()->updateExistingPivot($roleId, $attributes);

        $plays = Play::all();

        // create notification
        Session::flash('play_updated', 'Success! The play was successfully updated.');

        return view('admin.plays.index',compact('plays'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $play = Play::findOrFail($id);

        // destroy related image.
        unlink(public_path() . '\\images\plays\\' .  $play->photo->path);

        $play->delete();

        Session::flash('play_deleted', 'Play deleted successfully.');

        return redirect('admin/plays');
    }

}
