<?php

namespace App\Http\Controllers\FellowManagement;

use App\Http\Controllers\Controller;
use App\Mail\SelectMail;
use App\Mail\ShortListMail;
use Illuminate\Http\Request;
use App\Models\Fellow;
use App\Models\Question;
use App\Models\Track;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

use Illuminate\Support\Facades\Mail;

class FellowController extends Controller
{

    public function getAppliedFellows()
    {
        $fellows = Fellow::with('answers', 'track', 'lead')->get();
        $leads = User::all();
        return view('menu.fellows.applied.view', compact('fellows', 'leads'));
    }

    public function getShortlistedFellows()
    {
        $fellows = Fellow::with('answers', 'track', 'lead')->where('shortlisted', 1)->get();
        $leads = User::all();
        return view('menu.fellows.shortlisted.view', compact('fellows', 'leads'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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
        $fellow = Fellow::find($id);
        $fellow->delete();
        return redirect()->back()->with('success', 'Fellow deleted successfully');
    }

    public function fellowShortlisted($id)
    {
        $fellow = Fellow::find($id);
        $fellow->shortlisted = 1;
        $fellow->save();

        // Mail::to($fellow->email)->send(new ShortListMail());
        return response()->json(
            [
                'success' => true,
                'value' => 'Shortlisted'
            ]
        );
    }

    public function fellowNotShortlisted($id)
    {
        $fellow = Fellow::find($id);
        $fellow->shortlisted = 0;
        $fellow->save();
        return response()->json([
            'success' => true,
            'value' => 'Not Shortlisted'
        ]);
    }

    public function fellowSelected(Request $request, $id)
    {
        $fellow = Fellow::find($id);
        $fellow->selected = 1;
        $fellow->lead_id = $request->lead;
        $fellow->save();


        // Mail::to($fellow->email)->send(new SelectMail());

        return redirect()->back()->with('success', 'Fellow Selected');
    }

    public function fellowNotSelected($id)
    {
        $fellow = Fellow::find($id);
        $fellow->selected = 0;
        $fellow->save();

        return response()->json([
            'success' => true,
            'value' => 'Not Selected'
        ]);
    }

    public function showApplied($id)
    {
        $fellow = Fellow::with('answers', 'track', 'lead')->find($id);
        $answer1 = $fellow->answers->where('question_id', 1)->first()->answer ?? '';
        $answer2 = $fellow->answers->where('question_id', 2)->first()->answer ?? '';
        $answer3 = $fellow->answers->where('question_id', 3)->first()->answer ?? '';
        $answer4 = $fellow->answers->where('question_id', 4)->first()->answer ?? '';
        $answer5 = $fellow->answers->where('question_id', 5)->first()->answer ?? '';

        $questions = Question::all();
        return view('menu.fellows.applied.detail', compact('fellow', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'questions'));
    }

    public function showShortlisted($id)
    {
        $fellow = Fellow::with('answers', 'track', 'lead')->find($id);
        $answer1 = $fellow->answers->where('question_id', 1)->first()->answer ?? '';
        $answer2 = $fellow->answers->where('question_id', 2)->first()->answer ?? '';
        $answer3 = $fellow->answers->where('question_id', 3)->first()->answer ?? '';
        $answer4 = $fellow->answers->where('question_id', 4)->first()->answer ?? '';
        $answer5 = $fellow->answers->where('question_id', 5)->first()->answer ?? '';

        $questions = Question::all();
        //get User expect than 1 and 2
        $leadUsers = User::where('id', '!=', 1)->where('id', '!=', 2)->get();
        // get only those leads who have permission named flutter
        $leads = collect();
        $leads = $leadUsers->filter(function ($user) use ($answer4) {
            return $user->hasPermissionTo($answer4);
        });
        return view('menu.fellows.shortlisted.detail', compact('fellow', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'questions', 'leads'));
    }
    public function viewResume($id)
    {
        $fellow = Fellow::find($id);
        $filename = $fellow->resume;
        if ($filename) {
            if (Storage::disk('public')->exists('resume/' . $filename)) {
                // Get the file path
                $filePath = storage_path('app/public/resume/' . $filename);

                // Return the file as a response
                return response()->file($filePath);
            } else {
                // Return a 404 error if the file does not exist
                abort(404);
            }
        } else {
            return redirect()->back()->with('error', 'No resume found');
        }
        // Check if the file exists

    }
}
