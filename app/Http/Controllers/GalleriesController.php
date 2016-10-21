<?php

namespace App\Http\Controllers;

// models
use App\Gallery;
use App\Photo;
use App\Conference;
use Illuminate\Http\File;

// requests
use App\Http\Requests\GalleryAddRequest;
use App\Http\Requests\GalleryEditRequest;
use App\Http\Requests\GalleryUploadRequest;
use App\Http\Requests\GalleryLinkRequest;
use App\Http\Requests;

// illuminate support
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    // do upload
    public function doImageUpload(Request $request)
    {

        if($file = $request->file('file')){

            $name = $file->getClientOriginalName();

            $file->move('gallery/images', $name);

            $gallery = Gallery::find($request->gallery_id);

            $gallery->photos()->create(['path' => $name]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery_status = Gallery::pluck('status');
        return view('admin.gallery.create', compact('gallery_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get form data
        $form_data = $request->all();

        // create gallery from form data
        $gallery = Gallery::create($form_data);

        // if file uploaded, create name, move photo, create photo record, relate photo to gallery in lookup table.
        if($file = $request->file('file')){

            $name = $file->getClientOriginalName();

            $file->move('gallery/images', $name);

            // create related gallery photo records
            $gallery->photos()->create(['path' => $name]);

        }
    }

    // stores gallery name
    public function store_gallery(Request $request)
    {
        // get current user
        $user = Auth::user();

        // get form request data
        $form_data = $request->all();

        // create gallery with name, status & created by
        $gallery = Gallery::create(['name'=> $form_data['name'],'status' => $form_data['status'], 'created_by'=>$user->id]);

        // get id for redirect
        $id = $gallery->id;

        // redirect to edit page for adding photos
        return Redirect::route('galleries.edit',$id);
    }

    // display link gallery to conference form
    public function link_gallery($id)
    {
        // get gallery matching get $id
        $gallery = Gallery::findOrFail($id);


        // get conference titles for linking
        $conferences = Conference::pluck('title','id');

        return view('admin.gallery.link',compact('gallery','conferences','id'));
    }

    // link the gallery to a conference
    public function do_link(GalleryLinkRequest $request)
    {
        // get selected conference
        $select_conference = $request['conference_id'];

        // get gallery id matching currently linking gallery
        $gallery = Gallery::findOrFail($request['gallery_id']);

        // assign conference id of gallery to selected conference
        $gallery->conference_id = $select_conference;
        $gallery->save();

        // create notification
        Session::flash('gallery_linked', 'Gallery linked successfully!');

        return redirect('admin/galleries');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.show',compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryEditRequest $request, $id)
    {
        $form_data = $request->all();
        $gallery = Gallery::findOrfail($id);

        $gallery->name = $form_data['name'];
        $gallery->save();

        Session::flash('gallery_updated','The Gallery was successfully updated.');

        return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get gallery
        $gallery = Gallery::findOrFail($id);

        if(!$gallery->created_by === Auth::user()->id){
            abort(403, 'You are not allowed to delete this gallery.');
        }

        // get all gallery images
        $images = $gallery->photos->all();

        // remove pivot entries
        $gallery->photos()->detach();

        // destroy related images & records.
        foreach($images as $photo) {

            if( $photo ) {
                unlink(GALLERY_IMAGE_DIR . $photo->path);
                $photo->delete();
            }
        }

        Session::flash('gallery_deleted', "Gallery deleted successfully.");

        // delete gallery
        $gallery->delete();

        return redirect('admin/galleries');
    }

    // remove individual image
    public function imageRemove($id)
    {
        $photo = Photo::findOrFail($id);

        // delete image.
        unlink(GALLERY_IMAGE_DIR . $photo->path);

        // delete image record
        $photo->delete();

        return Redirect::back()->with('image_deleted','Image Removed');


    }
}