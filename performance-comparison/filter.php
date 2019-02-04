<?php
require '../bootstrap.php';
$array=[
    ["id"=>2,"name"=>"Apple"],
    ["id"=>1,"name"=>"Banana"],
    ["id"=>2,"name"=>"Apple"],
    ["id"=>1,"name"=>"Banana"],
];
$time_results = collect([]);



function for_filter($arr)
{
    $count = count($arr);
    $filtered = [];
    for($i=0; $i < $count; $i++){
        if($arr[$i]['name'][0] === 'A') {
            $filtered [] = $arr[$i];
        }
    }
    return $filtered;
}

function array_filter_function($arr)
{
    return array_filter($arr,
        function ($row) {
            return $row['name'][0] === 'A';
        });
}

$times = 100000;
//////////////////////////////////////

$start = microtime(1);

foreach (range(1, $times) as $i) {
    $for_mapped = for_filter($array);
}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);
dump($time . ' ms');
/////////////////////////////////////

$start = microtime(1);

foreach (range(1, $times) as $i) {
    $array_mapped = array_filter_function($array);
}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);

dump($time . ' ms');
//////////////////////////////////////


$start = microtime(1);
$collect = collect($array);
foreach (range(1, $times) as $i) {

    $collected = $collect->filter(function ($row) {
        return $row['name'][0] === 'A';
    });

}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);

dump($time . ' ms');

$max = $time_results->max();
$min = $time_results->min();
echo "Slowest time $max ms was ". round((($max-$min)/$min)*100, 2)."% slower than fastest time of $min ms\n";
