<?php
require_once  __DIR__.'/../bootstrap.php';

$faker = Faker\Factory::create();

$users = [];
foreach(range(1,250) as $i){
    $users []= [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->password
    ];
}

User::insert($users);

dump(count($users).' users added');