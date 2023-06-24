<?php

namespace App\Forms;

use \App\Core\Validator;

class ModifProfile extends Validator
{
    public $method = "POST";
    protected array $config = [];
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function getConfig() : array
    {
        $this->config = [
            "config" => [
                "method"  => $this->method,
                "action"  => "",
                "id"      => "profile-form",
                "class"   => "form",
                "enctype" => "",
                "submit"  => "Enregistrer les modifications"
            ],
            "inputs" => [
                "firstname"  => [
                    "id"          => "profile-form-firstname",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre prénom",
                    "type"        => "text",
                    "error"       => "Votre prénom doit faire entre 2 et 60 caractères",
                    "min"         => 2,
                    "max"         => 60,
                    "required"    => true,
                    "value"       => isset($this->user["firstname"]) ? $this->user["firstname"] : ""
                ],
                "lastname"   => [
                    "id"          => "profile-form-lastname",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre nom",
                    "type"        => "text",
                    "error"       => "Votre nom doit faire entre 2 et 120 caractères",
                    "min"         => 2,
                    "max"         => 120,
                    "required"    => true,
                    "value"       => isset($this->user["lastname"]) ? $this->user["lastname"] : ""
                ],
                "password"        => [
                    "id"          => "profile-form-pwf",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Votre mot de passe",
                    "type"        => "password",
                    "error"       => "Votre mot de passe doit faire au minimum 8 caractères avec au minimum une majuscule, une minuscule et un chiffre",
                    "required"    => true
                ],
                "passwordConfirm" => [
                    "id"          => "profile-form-pwd-confirm",
                    "class"       => "form-input form-control form-control-user",
                    "placeholder" => "Confirmer votre mot de passe",
                    "type"        => "password",
                    "error"       => "Le mot de passe ne correspond pas",
                    "required"    => true
                ]
            ]
        ];
        return $this->config;
    }
}
