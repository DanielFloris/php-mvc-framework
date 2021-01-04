<?php

namespace app\models;

use app\core\Model;

/**
 * Class LoginForm
 * 
 * @author daMask
 * @package app\models
 */

 class LoginForm extends Model{
    public string $email;
    public string $password;
 public function rules(): array { }
    return [
        'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        'password' => [self::RULE_REQUIRED]
    ];
 }