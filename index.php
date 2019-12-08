<?php

require_once "core/config/path.php";
require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once _CONFIG."DBconnector.php";


require_once _GLOBAL."GlobalController.php";


require_once _CONFIG."Routes.php";
require_once _ROUTER."Router.php";

echo $html;

print_r($_ENV);