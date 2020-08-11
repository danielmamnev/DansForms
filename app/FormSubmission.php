<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    //
    protected $fillable = ['form_id', 'ip'];

    public function inputs()
    {
        return $this->hasMany('App\SubmissionInput', 'submission_id');
    }
}
