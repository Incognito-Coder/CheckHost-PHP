<?php

use GuzzleHttp\Client;

require_once '../vendor/autoload.php';

$checkhost = new \Ahmand\CheckHost\CheckHost(new Client());

echo $checkhost->Nodes('ip'); // Returns nodes by IP

echo $checkhost->Nodes(); // Returns nodes by hosts
