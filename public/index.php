<?php

use Src\Http\Request\Request;
use Src\Http\Response\Response;
use Src\Http\Routes\Route;

require_once __DIR__ . "/../vendor/autoload.php";

require_once __DIR__ . "/../routes/web.php";

$route = new Route(new Request , new Response);
$route->resolve();


?>
