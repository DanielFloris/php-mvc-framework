<?php

namespace app\core\form;



/**
 * Class BaseField
 * 
 * @author daMask
 * @package app\core\form
 */
abstract class BaseField
{
   abstract public function renderInput() : string;
}