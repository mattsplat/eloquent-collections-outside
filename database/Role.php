<?php

require_once __DIR__."/../bootstrap.php";



use Illuminate\Database\Capsule\Manager;



Manager::schema()->create('role', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->unsignedInteger('user_id');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->timestamps();

});