<?php

namespace App\Http\Controllers\TrackManagement;

use App\Http\Controllers\Controller;
use App\Models\Fellow;
use App\Models\Track;
use Illuminate\Http\Request;
use Auth;


class TrackController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function trackFellows($id)
    {
        //get all fellows in a track 
        $user = Auth::user();
        if ($user->id == 1 || $user->id == 2) {
            $fellows = Fellow::where('track_id', $id)
                ->where('selected', 1)
                ->with('lead', 'track')
                ->get();
        } else {
            $fellows = Fellow::where('track_id', $id)
                ->where('selected', 1)
                ->where('lead_id', $user->id)
                ->with('lead', 'track')
                ->get();
        }
        $track = Track::find($id);

        return view('menu.track.view', compact('fellows', 'track'));
    }
}
