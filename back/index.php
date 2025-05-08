<?php

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use App\Controller\Controller;

ini_set('error_reporting', E_ALL);

setApplicationJson();

new Controller();