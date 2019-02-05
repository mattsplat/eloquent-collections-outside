<?php

require "../bootstrap.php";



use Illuminate\Database\Capsule\Manager;



Manager::schema()->create('notes', function ($table) {
    $table->increments('id');
    $table->string('notable_type');
    $table->unsignedInteger('noteable_id');
    $table->unsignedInteger('user_id');
    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});