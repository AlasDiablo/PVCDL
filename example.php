<?php

use mvcdeploy\MvcDeploy;
use Slim\Slim;

//////////////////////////////////////////
require_once 'ExampleView.php';         // DON'T DO THIS
require_once 'ExampleController.php';   // DON'T DO THIS
//////////////////////////////////////////

require_once 'vendor/autoload.php';

$view = MvcDeploy::getViewHandler(['ROOT' => new ExampleView()]);
$controller = MvcDeploy::getControllerHandler($view, ['ROOT' => new ExampleController()]);


$app = new Slim();

$app->get('/', function () {
    global $controller;
    $controller->callAController('ROOT', []);
});

$app->run();