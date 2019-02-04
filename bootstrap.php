<?php



require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;



$capsule = new Capsule;

$capsule->addConnection([

    "driver" => "mysql",

    "host" =>"192.168.10.10",

    "database" => "elo",

    "username" => "homestead",

    "password" => "secret"

]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
