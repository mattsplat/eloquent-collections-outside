<?php
require 'bootstrap.php';

$array = [
    [
        'uid' => '100',
        'name' => 'Sandra Shush',
        'number_of_things' => 5
    ],
    [
        'uid' => '5465',
        'name' => 'Stefanie Mcmohn',
        'number_of_things' => 6
    ],
    [
        'uid' => '40489',
        'name' => 'Michael',
        'number_of_things' => 2
    ]
];

dump(collect($array)->average('uid'));

$result= collect($array)->where('number_of_things', '>=', 4);

$array = array_filter($array, function ($row) {
    return ($row['number_of_things'] >= 4);
});



dd($result, $array);