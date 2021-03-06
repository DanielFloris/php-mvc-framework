<?php

namespace app\core\middlewares;

/**
* Class BaseMiddleware
* 
* @author daMask
* @package app\core\middlewares
*/

abstract class BaseMiddleware {

    abstract public function execute();
 }