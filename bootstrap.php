<?php



require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;


$base_path = __DIR__;
$capsule = new Capsule;

$sqlite = [
    "driver" => "sqlite",

    "host" =>"127.0.0.1",

    "database" => $base_path.'/database/db.sqlite',

    "username" => "homestead",

    "password" => "secret"
];

$mysql = [
    "driver" => "mysql",

    "host" =>"192.168.10.10",

    "database" => 'elo',

    "username" => "homestead",

    "password" => "secret"
];

$capsule->addConnection($mysql);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
