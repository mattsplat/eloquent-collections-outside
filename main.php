<?php
require 'bootstrap.php';


$users = User::orderBy('name')->limit(10)->get();

$grouped = $users->mapToGroups( function ($user) {
    return [
        $user->name[0] => $user
    ];
});

$sum = $grouped->sum(function ($group) {
    return $group->count();
});

dump($sum);
dd($grouped['A']->count());