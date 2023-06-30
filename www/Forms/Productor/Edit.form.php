<?php

namespace App\Forms\Productor;

use \App\Core\Validator;

class Edit extends Validator
{
    protected $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "update",
                "id" => "productor-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Modifier",
                "type" => "submit",
                "name" => "Modifier",
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
                    "required"     => true,
                    "readonly"     => false
                ]
            ]
        ];
        return $this->config;
    }
}
