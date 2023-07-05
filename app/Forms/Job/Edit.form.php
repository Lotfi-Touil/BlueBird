<?php

namespace App\Forms\Staff;

use \App\Core\Validator;

class Edit extends Validator
{
    protected $method = "POST";
    protected array $config = [];

    public function __construct()
    {
        $this->initConfig();
    }

    public function getConfig() : array
    {
        return $this->config;
    }

    public function initConfig(): void
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "update",
                "id" => "staff-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Enregistrer"
            ],
            "inputs" => [
                "firstname" => [
                    "id" => "staff-form-firstname",
                    "class" => "form-control",
                    "placeholder" => "Prénom",
                    "type" => "text",
                    "error" => "",
                    "required" => true
                ],
                "lastname" => [
                    "id" => "staff-form-lastname",
                    "class" => "form-control",
                    "placeholder" => "Nom",
                    "type" => "text",
                    "error" => "",
                    "required" => true
                ],
                "birthdate" => [
                    "id" => "staff-form-birthdate",
                    "class" => "form-control",
                    "placeholder" => "Date de naissance",
                    "type" => "date",
                    "error" => "",
                    "required" => true
                ],
                "birthplace" => [
                    "id" => "staff-form-birthplace",
                    "class" => "form-control",
                    "placeholder" => "Lieu de naissance",
                    "type" => "text",
                    "error" => "",
                    "required" => true
                ],
                "nationality" => [
                    "id" => "staff-form-nationality",
                    "class" => "form-control",
                    "placeholder" => "Nationalité",
                    "type" => "text",
                    "error" => "",
                    "required" => true
                ],
                "biography" => [
                    "id" => "staff-form-biography",
                    "class" => "form-control",
                    "placeholder" => "Biographie",
                    "type" => "textarea",
                    "error" => "",
                    "required" => true
                ],
            ]
        ];
    }
}
