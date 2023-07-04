<?php

namespace App\Forms\Productor;

use \App\Core\Validator;

class Create extends Validator
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
                "action" => "store",
                "id" => "productor-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Ajouter",
                "name" => "Ajouter",
                "disabled" => false,
                "type" => "submit"
            ],
            "inputs" => [
                "name" => [
                    "id" => "productor-form-title",
                    "class" => "form-control",
                    "placeholder" => "Nom",
                    "type" => "text",
                    "error" => "",
                    "required" => true,
                    "label" => "Nom",
                    "readonly" => false 
                ],
                "description" => [
                    "id" => "productor-form-description",
                    "class" => "form-control summernote",
                    "placeholder" => "Description",
                    "type" => "textarea",
                    "error" => "",
                    "required" => true,
                    "label" => "Description",
                    "readonly" => false
                ],
                "id_country" => [
                    "id" => "productor-form-id_country",
                    "class" => "form-control",
                    "placeholder" => "Pays",
                    "type" => "select",
                    "error" => "",
                    "required" => true,
                    "label" => "Pays",
                    "readonly" => false
                ]
            ]
        ];
    }
}
