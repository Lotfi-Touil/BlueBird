<?php

namespace App\Forms;

use \App\Core\Validator;

class Register extends Validator
{
    public $method = "POST";
    protected array $config = [];

    public function getConfig() : array
    {
        $this->config = [
            "config" => [
                "method"  => $this->method,
                "action"  => "",
                "id"      => "register-form",
                "class"   => "form",
                "enctype" => "",
                "submit"  => "Nous rejoindre",
                'reset'   => "Annuler"
            ],
            "inputs" => [
                "firstname"  => [
                    "id"          => "register-form-firstname",
                    "class"       => "form-input",
                    "placeholder" => "Votre prénom",
                    "type"        => "text",
                    "error"       => "Votre prénom doit faire entre 2 et 60 caractères",
                    "min"         => 2,
                    "max"         => 60,
                    "required"    => true
                ],
                "lastname"   => [
                    "id"          => "register-form-lastname",
                    "class"       => "form-input",
                    "placeholder" => "Votre nom",
                    "type"        => "text",
                    "error"       => "Votre nom doit faire entre 2 et 120 caractères",
                    "min"         => 2,
                    "max"         => 120,
                    "required"    => true
                ],
                "email"      => [
                    "id"          => "register-form-email",
                    "class"       => "form-input",
                    "placeholder" => "Votre email",
                    "type"        => "text",
                    "error"       => "Votre email est incorrect",
                    "required"    => true
                ],
                "password"        => [
                    "id"          => "register-form-pwf",
                    "class"       => "form-input",
                    "placeholder" => "Votre mot de passe",
                    "type"        => "text",
                    "error"       => "Votre mot de passe doit faire au minimum 8 caractères avec au minimum une majuscule, une minuscule et un chiffre",
                    "required"    => true
                ],
                "passwordConfirm" => [
                    "id"          => "register-form-pwd-confirm",
                    "class"       => "form-input",
                    "placeholder" => "Confirmer votre mot de passe",
                    "type"        => "text",
                    "error"       => "Le mot de passe ne correspond pas",
                    "required"    => true,
                    "submit"      => "pwd"
                ]
            ]
        ];
        return $this->config;
    }
}