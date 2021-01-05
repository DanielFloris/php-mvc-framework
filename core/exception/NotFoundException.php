<?php
namespace app\core\exception;
/**
* Class NotFoundException
* 
* @author daMask
* @package app\core\exception
*/

class NotFoundException extends \Exception {
    protected $code = 404;
    protected $message = 'Page not found';
 }