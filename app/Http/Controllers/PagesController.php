<?php

namespace App\Http\Controllers;

// requests
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;

// models
use App\Conference;
use App\Play;

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

    /*
                                                        conferences
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
}
