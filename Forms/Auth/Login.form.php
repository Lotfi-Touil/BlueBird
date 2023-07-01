<?php

namespace App\Forms\Auth;

use \App\Core\Validator;

class Login extends Validator
{
    protected $method = "POST";
    protected array $config = [];

    public function __construct()
    {
        $this->initConfig();
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    private function initConfig(): void
    {
        $this->config = [
            "config" => [
                "method"  => $this->method,
                "action"  => "",
                "id"      => "login-form",
                "class"   => "form",
                "enctype" => "",
                "submit"  => "Se connecter"
            ],
            "inputs" => [
                "email"    => [
                    "id"          => "login-form-email",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre email",
                    "type"        => "text",
                    "error"       => "Votre email est incorrect",
                    "required"    => true
                ],
                "password" => [
                    "id"          => "login-form-pwd",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre mot de passe",
                    "type"        => "password",
                    "error"       => "Votre mot de passe est incorrect",
                    "required"    => true
                ]
            ]
        ];
    }
}
