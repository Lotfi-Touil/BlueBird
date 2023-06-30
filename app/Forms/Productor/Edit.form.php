<?php

namespace App\Forms\Productor;

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
                "id" => "post-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Enregistrer",
                "type" => "submit",
                "name" => "Modifier",
                "disabled" => false
            ],
            "inputs" => [
                "name" => [
                    "id" => "post-form-name",
                    "class" => "form-control",
                    "placeholder" => "Nom",
                    "type" => "text",
                    "error" => "",
                    "required" => true,
                    "label" => "Nom",
                    "readonly" => false,
                    "attribut" => "input",
                ],
                "description" => [
                    "id" => "post-form-description",
                    "class" => "form-control summernote",
                    "placeholder" => "Description",
                    "attribut" => "textarea",
                    "type" => "",
                    "error" => "",
                    "label" => "Description",
                    "required" => true,
                    "readonly" => false,
                ]
            ]
        ];
    }
}