<?php

namespace App\Forms\Productor;

use \App\Core\Validator;

class Show extends Validator
{
    protected $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method" => $this->method,
                "action" => "",
                "id" => "productor-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Voir",
                "type" => "submit",
                "name" => "Voir",
                "disabled" => true
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
                    "readonly"     => true
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
                    "readonly"     => true
                ]
            ]
        ];
        return $this->config;
    }
}
