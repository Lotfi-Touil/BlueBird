<?php

namespace App\Forms\Post;

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
                "submit" => "Enregistrer"
            ],
            "inputs" => [
                "title" => [
                    "id" => "post-form-title",
                    "class" => "form-control",
                    "placeholder" => "Titre",
                    "type" => "text",
                    "error" => "",
                    "required" => true
                ],
                "content" => [
                    "id" => "post-form-content",
                    "class" => "form-control summernote",
                    "placeholder" => "Contenu",
                    "type" => "textarea",
                    "error" => "",
                    "required" => true
                ]
            ]
        ];
    }
}
