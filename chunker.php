<?php

ini_set("output_buffering", false);

$limit = 4096 * 10;
$interval = 256;
$progress = 0;

do {
    $num = $limit - $progress / $interval;
    $buff = range(0, $num);
    print(str_repeat(".", count($buff)));
    
    $progress += 1;
} while ($progress < 50);

ob_flush();
flush();