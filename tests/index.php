<?php

use GuzzleHttp\Client;

require_once '../vendor/autoload.php';

$checkhost = new \Ahmand\CheckHost\CheckHost(new Client());
$ping = $checkhost->PingCheck('mr-alireza.ir');
echo $checkhost->CheckResult();
