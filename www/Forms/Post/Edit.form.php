<?php

namespace App\Forms\Post;

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
                "id" => "post-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Enregistrer"
            ],
            "inputs" => [
                "title" => [
                    "id" => "post-form-title",
                    "class" => "form-control",
                    "placeholder" => "Titre",
                    "type" => "text",
                    "tag" => "input",
                    "error" => "",
                    "required" => true,
                    "disabled" => false
                ],
                "content" => [
                    "id" => "post-form-content",
                    "class" => "form-control summernote",
                    "placeholder" => "Contenu",
                    "type" => "textarea",
                    "tag" => "textarea",
                    "error" => "",
                    "required" => true,
                    "disabled" => false
                ]
            ]
        ];
        return $this->config;
    }
}
