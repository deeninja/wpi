<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AboutSection;

use App\Http\Requests\AdminAboutUpdateRequest;
use Illuminate\Support\Facades\Session;

class AdminAboutSection extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = AboutSection::findOrFail(1);
        return view('admin.about.index', compact('about'));
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
    public function store(Request $request)
    {
        //
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
        $about = AboutSection::findOrFail(1);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminAboutUpdateRequest $request, $id)
    {
        $form_data = $request->all();

        $about = AboutSection::findOrFail($id);

        if( $file = $request->file('cover_image') ) {

            $name = time() . '-' . $file->getClientOriginalName();

            $file->move('images/about', $name);

            $file_path = $file->getPath();

            $file_path = $name;

            $form_data['cover_image'] = $file_path;


        }

        $about->update($form_data);

        Session::flash('about_updated', 'About Us Page successfully updated.');

        return view('admin.about.index', compact('about'));

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
