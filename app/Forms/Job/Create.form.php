<?php

namespace App\Forms\Job;

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
                "id" => "job-form",
                "class" => "form",
                "enctype" => "multipart/form-data",
                "submit" => "Créer un job"
            ],
            "inputs" => [
                "name" => [
                    "id" => "job-form-firstname",
                    "class" => "form-control",
                    "placeholder" => "Prénom",
                    "type" => "text",
                    "error" => "",
                    "required" => true
                ],
            ]
        ];
    }
}
