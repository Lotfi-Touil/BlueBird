<?php

namespace App\Forms\Productor;

use \App\Core\Validator;

class Create extends Validator
{
    protected $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "store",
                "id" => "productor-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Ajouter",
                "type" => "submit",
                "name" => "Ajouter",
                "disabled" => false
            ],
            "inputs" => [
                "name" => [
                    "id"           => "productor-form-name",
                    "class"        => "form-control",
                    "placeholder"  => "Nom de la maison de production",
                    "label"        => "Nom",
                    "attribut"     => "input",
                    "type"         => "text",
                    "error"        => "",
                    "required"     => true,
                    "min"          => 2,
                    "max"          => 200,
                    "readonly"     => false
                ],
                "description" => [
                    "id"           => "productor-form-description",
                    "class"        => "form-control summernote",
                    "placeholder"  => "Description de la maison de production",
                    "label"        => "Description",
                    "attribut"     => "textarea",
                    "type"         => "",
                    "error"        => "",
                    "required"     => false,
                    "min"          => 0,
                    "max"          => 2000,
                    "readonly"     => false
                ]
            ]
        ];
        return $this->config;
    }
}
