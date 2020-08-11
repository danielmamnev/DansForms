<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Forms;
use App\Questions;
use App\FormSubmission;
use App\SubmissionInput;
use App\User;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $myforms = Forms::where('user_id', auth()->user()->id)->get();
        $user = User::select('name')->where('id', auth()->user()->id)->first();
        $username = $user->name;
       
       
        return view('forms')->with('my_forms',$myforms)->with('username', $username);
    }

    public function new()
    {
        return view('new-form');
    }

    public function view($id)
    {
        $form = Forms::findOrFail($id);

        return view('view', ['form' => $form]);
    }

    public function store(Request $request) {

        $data = request()->validate([
            'formname' => 'required'
        ]);
        $numQuestions = $request->input('numberOfQuestions');

        $form = Forms::create([
            'name' => $request->input('formname'),
            'user_id' => auth()->user()->id,
            'numOfQuestions' => $numQuestions
        ]);

        // $existing = DB::table('questions')->where('form_id', '=', $form->id)->count();
        for ($x = 1; $x <= $numQuestions; $x++){
            $questions = Questions::create([
                'form_id' => $form->id,
                'question' => 'Question ' .$x
            ]);
        };
        
        return view('edit', ['form' => $form]);
    }

    public function edit($id){
        $form = Forms::findOrFail($id);

        return view('edit',['form' => $form]);
    }

    public function update(Request $request, $id){
    
        //print '<pre>'; print_r($request->question); print '</pre>'; die();
        $form = Forms::findOrFail($id);
        foreach($form->questions as $question){
            if( isset($request->question[$question->id]) && $request->question[$question->id] !== $question->question ) {
                $Q = $request->question[$question->id];
                $question->update(['question' => $Q]);
            }
            
        }

        return view('view',['form' => $form]);

    }

    public function delete($id){
        $form = Forms::findOrFail($id);
        return view('delete', ['form' => $form]);
    }


    public function destroy($id){
        Forms::destroy($id);

        return redirect('forms');
    }
    public function viewSubmissions($id){
        $form = Forms::findOrFail($id);
    $Questions = Questions::select('id')->where('form_id', $id)->get();
        
        $submissions = FormSubmission::select('id')->where('form_id',$id)->get();

    //     foreach($submissions as $sub){
    // $inputs = SubmissionInput::select('input')->where('submission_id', $sub->id)->get();
    //     }
     return view('view-submissions', ['form' => $form], ['submissions' => $submissions]);   
    }

    public function viewSubInput($id, $sid){
        $form = Forms::findOrFail($id);
       

        $i = SubmissionInput::where('submission_id', $sid)->get();
        $q = Questions::where('form_id', $id)->get();
  
        

       
        return view('view-input')->with('i',$i)->with('q',$q)->with('form', $form)->with('sid', $sid);
    }

//    public function export($id)
//     {
//         $Questions = Questions::where('form_id', $id)->get();
//         $subData = FormSubmission::select('id')->where('form_id',$id)->get()->toArray();


//         foreach($subData as $key => $sub){
//           echo "$key: $sub->id";
//         }
       
        
//     }
}


