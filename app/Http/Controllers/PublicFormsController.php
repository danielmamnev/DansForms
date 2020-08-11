<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Forms;
use App\Questions;
use App\FormSubmission;
use App\SubmissionInput;

class PublicFormsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function submit(Request $request)
    {
        $form = Forms::findOrFail($request->input('form-id'));

        $submission = FormSubmission::create([
            'ip' => $request->ip(),
            'form_id' => $form->id
        ]);
        foreach($form->questions as $question){
            if( isset($request->question[$question->id]) && $request->question[$question->id] !== $question->question ) {
                $value = $request->question[$question->id];

                SubmissionInput::create([
                    'input' => $value,
                    'question_id' => $question->id,
                    'submission_id' => $submission->id
                ]);
            }
            
        }
        // print '<pre>'; print_r($request->all()); print '</pre>'; die();

        return view('public-view', ['form' => $form]);
    }

    public function view($userName, $formName)
    {
        $user = User::where('name', $userName)->first();
        $form = Forms::where([['name', $formName], ['user_id', $user->id]])->first();

        // print '<pre>'; print_r($form); print '</pre>'; die();

        return view('public-view', ['form' => $form]);
    }

}
