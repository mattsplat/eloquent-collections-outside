<?php
require_once __DIR__."/../bootstrap.php";

use Illuminate\Database\Capsule\Manager;

Manager::schema()->create('countries', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->timestamps();
});