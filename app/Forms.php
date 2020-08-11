<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{

    //
    protected $table = 'forms';
    protected $fillable = ['user_id', 'name', 'numOfQuestions'];

        
    public function questions()
    {
        return $this->hasMany('App\Questions', 'form_id');
    }

    public function submissions()
    {
        return $this->hasMany('App\FormSubmission', 'form_id');
    }
}
