<?php
const MAX_LOAD = 25;
$load = sys_getloadavg();
if ($load[0] > MAX_LOAD) {
    http_response_code(503);
    exit('503');
}
if (!isset($_SERVER['APP_ENV'])) {
    $root = __DIR__;
    if (!file_exists($root.'/.env')) {
        http_response_code(500);
        exit('unknown environment');
    }
    require_once $root.'/vendor/autoload.php';
    Dotenv\Dotenv::createImmutable($root)->load();
}
exit('ok');