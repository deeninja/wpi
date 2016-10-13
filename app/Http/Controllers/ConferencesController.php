<?php

namespace App\Http\Controllers;

// requests
use App\Http\Requests\ConferenceEditRequest;
use App\Http\Requests\ConferenceAddRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

// model
use App\Conference;
use App\Photo;
use App\Play;

// packages
use Carbon\Carbon;

// facades
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ConferencesController extends Controller
{
    /**
     * display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences = Conference::all();

        /*  $conference = Conference::findOrFail(4);
          dd();*/

        return view('admin.conferences.index', compact('conferences'));
    }

    /**
     * show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conferences.create');
    }

    /**
     * store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConferenceAddRequest $request)
    {
        // get form data
        $form_data = $request->all();

        // if photo exists in upload input
        if( $file = $request->file('photo_id') ) {

            // get file basename
            $file_name = time() . '-' . $file->getClientOriginalName();

            // upload file
            $file->move('images', $file_name);

            // create photo ei / object
            $photo = Photo::create(['path'=>$file_name]);

            // assign new photo id to request data
            $form_data['photo_id'] = $photo->id;

        }

        // create conference ei / record
        $conference = Conference::create($form_data);

        Session::flash('conference_created', 'Success! Conference has been created.');
        return redirect('admin/conferences');

    }

    /**
     * display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get current conference (in url) record
        $conference = Conference::findOrFail($id);

        // go to the conference related plays table, & get all plays with conference id matching $id in get request.
        $conference_plays = $conference->plays()->where('conference_id',$id)->get();

        return view('admin.conferences.show', compact('conference','conference_plays'));
    }

    /**
     * show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $conference = Conference::findOrFail($id);

        return view('admin.conferences.edit', compact('conference'));
    }

    /**
     * update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConferenceEditRequest $request, $id)
    {
        // get record matching id in get url (appended in form action)
        // find current users record
        $conference = Conference::findOrFail($id);

        $form_data = $request->all();


        // save form data

        // if there is a photo uploaded, extract, create photo, save new photo id to request data id for linking.
        if( $file = $request->file('photo_id') ) {

            // extract & create timestamped file name,
            $file_name = time() . '-' . $file->getClientOriginalName();

            // move file in request to images folder,
            $file->move('images', $file_name);

            // create photo ei / record with path as file name,
            $photo = Photo::create([ 'path' => $file_name ]);

            // save it's id to the requests photo id.
            $form_data['photo_id'] = $photo->id;

        }

        $conference->update($form_data);

        Session::flash('conference_updated', 'Success! The conference was successfully updated.');

        return view('admin.conferences.show', compact('conference'));
        //return Redirect::back();

    }

    /**
     * remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find get url id conference
        $conference = Conference::findOrFail($id);

        // destroy related image.
        unlink(public_path() . $conference->photo->path);

        // delete the ei / record
        $conference->delete();

        Session::flash('conference_deleted', 'Conference deleted successfully.');
        return redirect('admin/conferences');

    }

    public function show_plays($id) {

        // get all plays
        $plays = Play::all();

        // get current conference (in url) record
        $conference = Conference::findOrFail($id);

        // go to the conference related plays table, & get all plays with conference id matching $id in get request.
        $conference_plays = $conference->plays()->where('conference_id',$id)->get();

        return view('admin.plays.show', compact('conference_plays'));

    }
}
