<?php
require_once  __DIR__.'/../bootstrap.php';

$time_results = collect([]);


function getConnection()
{
    $host = '192.168.10.10';
    $db   = 'elo';
    $user = 'homestead';
    $pass = 'secret';
    $charset = 'utf8mb4';

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $pdo;
}

function pdo($pdo)
{

    $stmt = $pdo->query("SELECT * FROM users where name like 'j%'");
    return $stmt->fetchAll();
}



$times = 200;
//////////////////////////////////////

$start = microtime(1);

$conn = getConnection();
foreach (range(1, $times) as $i) {
    $users = pdo($conn);
}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);
dump($time . ' ms');
/////////////////////////////////////

$start = microtime(1);

foreach (range(1, $times) as $i) {
    $users = $capsule->table('users')->where('name', 'like', 'j%')->get();
}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);

dump($time . ' ms');
//////////////////////////////////////


$start = microtime(1);

foreach (range(1, $times) as $i) {
    $users = User::where('name', 'like', 'j%')->get();
}

$end = microtime(1);
$time = round(($end - $start) * 1000, 2);
$time_results->push($time);

dump($time . ' ms');

$max = $time_results->max();
$min = $time_results->min();
echo "Slowest time $max ms was ". round((($max-$min)/$min)*100, 2)."% slower than fastest time of $min ms\n";
