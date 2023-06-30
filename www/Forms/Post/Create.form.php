<?php

namespace App\Forms\Post;

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
                "id" => "post-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Créer un article",
                "name" => "Créer un article",
                "disabled" => false,
                "type" => "submit"
            ],
            "inputs" => [
                "title" => [
                    "id" => "post-form-title",
                    "class" => "form-control",
                    "placeholder" => "Titre",
                    "type" => "text",
                    "error" => "",
                    "required" => true,
                    "label" => "Titre",
                    "readonly" => false,
                    "attribut" => "input",
                ],
                "content" => [
                    "id" => "post-form-content",
                    "class" => "form-control summernote",
                    "placeholder" => "Contenu",
                    "type" => "textarea",
                    "error" => "",
                    "required" => true,
                    "label" => "Contenu",
                    "readonly" => false,
                    "attribut" => "textarea"
                ]
            ]
        ];
        return $this->config;
    }
}
