<?php   

$app = new Application();
$router = new Router();
$router->get('/', function(){
    return 'Hello World';
});

$app->userRouter($router);
$app->run();