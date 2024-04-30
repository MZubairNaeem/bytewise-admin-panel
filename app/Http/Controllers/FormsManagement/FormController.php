<?php

namespace App\Http\Controllers\FormsManagement;

use App\Http\Controllers\Controller;
use App\Mail\ApplyMail;
use App\Models\Answer;
use App\Models\Fellow;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Track;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
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

    public function applyform()
    {
        $questions = Question::all();
        $tracks = Track::all();

        return view('menu.forms.apply-form', compact('questions', 'tracks'));
    }

    public function submitform(Request $request)
    {
        $fellows = new Fellow();
        $fellows->name = $request->name;
        $fellows->email = $request->email;
        $fellows->phone = $request->phone;
        $fellows->track_id = preg_replace('/[^0-9]/', '', $request->input('q' . 4));

        $fellows->save();

        for ($i = 1; $i <= 5; $i++) {
            $answers = new Answer();
            $answers->question_id = $i;
            $answers->answer = preg_replace('/[0-9]/', '', $request->input('q' . $i));
            $answers->fellow_id = $fellows->id;
            $answers->save();
        }

        if ($request->hasFile('resume')) {
            $fileName = time() . $request->file('resume')->getClientOriginalName();
            $fileName = str_replace(' ', '', $fileName);
            $path = $request->file('resume')->storeAs('resume', $fileName, 'public');
            $fellows->resume = $fileName;
            $fellows->save();
        }

        // Mail::to($fellows->email)->send(new ApplyMail());


        return redirect()->back()->with('success', 'You have successfully applied for the fellowship. We will get back to you soon.');
    }
}
