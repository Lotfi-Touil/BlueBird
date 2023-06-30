<?php

namespace App\Forms;

use \App\Core\Validator;

class Login extends Validator
{
    protected $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method"  => $this->method,
                "action"  => "",
                "id"      => "login-form",
                "class"   => "form",
                "enctype" => "",
                "submit"  => "Se connecter",
                "disabled" => false,
                "name" => "Se connecter",
                "type" => "submit"
            ],
            "inputs" => [
                "email"    => [
                    "id"          => "login-form-email",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre email",
                    "type"        => "text",
                    "error"       => "Votre email est incorrect",
                    "required"    => true,
                    "readonly"    => false,
                    "label"       =>  "Identifiant"
                ],
                "password" => [
                    "id"          => "login-form-pwd",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre mot de passe",
                    "type"        => "password",
                    "error"       => "Votre mot de passe est incorrect",
                    "required"    => true,
                    "readonly"     => false,
                    "label"       =>  "Mot de passe"
                ]
            ]
        ];
        return $this->config;
    }
}
