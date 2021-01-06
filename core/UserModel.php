<?php
namespace app\core;
/**
* Class UserModel
* 
* @author daMask
* @package app\core
*/

abstract class UserModel extends DbModel{

    abstract public function getDisplayName(): string;
 }