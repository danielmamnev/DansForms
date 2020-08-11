<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionInput extends Model
{
    //
    protected $fillable = ['submission_id', 'input', 'question_id'];

public function formSubmission()
{

return $this->belongsTo(FormSubmission::class);

}


}


