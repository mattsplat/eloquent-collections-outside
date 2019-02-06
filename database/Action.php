<?php

require_once __DIR__."/../bootstrap.php";



use Illuminate\Database\Capsule\Manager;



Manager::schema()->create('actions', function ($table) {
    $table->increments('id');
    $table->string('actionable_type');
    $table->unsignedInteger('actionable_id');
    $table->unsignedInteger('user_id');
    $table->json('old_record');
    $table->json('new_record');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->timestamps();

});