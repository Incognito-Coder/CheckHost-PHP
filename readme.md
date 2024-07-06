# CheckHost PHP
[CheckHost](check-host.net) wrapper for php depends on php 8
## Installation
```bash
composer require ahmand/check-host
```
### Sample
```php
<?php

use GuzzleHttp\Client;

require_once '../vendor/autoload.php';

$checkhost = new \Ahmand\CheckHost\CheckHost(new Client());
$ping = $checkhost->PingCheck('mr-alireza.ir');
sleep(5); // sleep 5 or 10 sec to get full result
echo $checkhost->CheckResult($ping['id']);
```