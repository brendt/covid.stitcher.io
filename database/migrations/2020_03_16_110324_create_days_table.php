<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();

            $table->string('country');
            $table->string('country_code');
            $table->dateTime('date');
            $table->integer('confirmed')->nullable();
            $table->integer('deaths')->nullable();
            $table->integer('recovered')->nullable();

            $table->unique(['country_code', 'country', 'date']);

            $table->timestamps();
        });
    }
}
