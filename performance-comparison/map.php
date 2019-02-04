<?php
require '../bootstrap.php';
$array=[
    ["id"=>2,"name"=>"Apple"],
    ["id"=>1,"name"=>"Banana"],
    ["id"=>2,"name"=>"Apple"],
    ["id"=>1,"name"=>"Banana"],
];
$time_results = collect([]);



function for_map($arr)
{
    $count = count($arr);
    $mapped = [];
    for($i=0; $i < $count; $i++){
        $mapped []= $arr[$i]['name'];
    }
    return $mapped;
}

function array_map_function($arr){
    return array_map( function ($row) {
        return $row['name'];
    },$arr);
}

$times = 100000;
//////////////////////////////////////

$start = microtime(1);

foreach (range(1, $times) as $i) {
    $for_mapped = for_map($array);
}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);
dump($time . ' ms');
/////////////////////////////////////

$start = microtime(1);

foreach (range(1, $times) as $i) {
    $array_mapped = array_map_function($array);
}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);

dump($time . ' ms');
//////////////////////////////////////


$start = microtime(1);
$collect = collect($array);
foreach (range(1, $times) as $i) {
    $collected = $collect->map(function ($row) {
        return $row['name'];
    });
}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);

dump($time . ' ms');

$max = $time_results->max();
$min = $time_results->min();
echo "Slowest time $max ms was ". round((($max-$min)/$min)*100, 2)."% slower than fastest time of $min ms\n";
