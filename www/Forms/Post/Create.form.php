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
                "submit" => "Créer un article"
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
