<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Forms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        //
        {
            Schema::create('forms', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->string('name', 255);
                $table->integer('numOfQuestions');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}


