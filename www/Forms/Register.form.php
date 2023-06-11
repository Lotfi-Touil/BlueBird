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
                "submit"  => "Nous rejoindre"
            ],
            "inputs" => [
                "firstname"  => [
                    "id"          => "register-form-firstname",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre prénom",
                    "type"        => "text",
                    "error"       => "Votre prénom doit faire entre 2 et 60 caractères",
                    "min"         => 2,
                    "max"         => 60,
                    "required"    => true
                ],
                "lastname"   => [
                    "id"          => "register-form-lastname",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre nom",
                    "type"        => "text",
                    "error"       => "Votre nom doit faire entre 2 et 120 caractères",
                    "min"         => 2,
                    "max"         => 120,
                    "required"    => true
                ],
                "country"      => [
                    "id"          => "register-form-country",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre pays",
                    "type"        => "text",
                    "error"       => "Le pays est incorrect",
                    "required"    => false
                ],
                "email"      => [
                    "id"          => "register-form-email",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre email",
                    "type"        => "text",
                    "error"       => "Votre email est incorrect",
                    "required"    => true
                ],
                "password"        => [
                    "id"          => "register-form-pwf",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre mot de passe",
                    "type"        => "password",
                    "error"       => "Votre mot de passe doit faire au minimum 8 caractères avec au minimum une majuscule, une minuscule et un chiffre",
                    "required"    => true
                ],
                "passwordConfirm" => [
                    "id"          => "register-form-pwd-confirm",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Confirmer votre mot de passe",
                    "type"        => "password",
                    "error"       => "Le mot de passe ne correspond pas",
                    "required"    => true,
                    "submit"      => "pwd"
                ]
            ]
        ];
        return $this->config;
    }

    public function isValid(): bool
    {
        if (!$this->checkValidity() || !$this->isSubmited()) {
            return false;
        }

        $this->data = ($this->method == "POST")?$_POST:$_GET;

        if ($this->data['password'] !== $this->data['passwordConfirm']) {
            $this->errors[]=$configInput['error'];
        }

        return (bool)empty($this->errors);
    }
}
