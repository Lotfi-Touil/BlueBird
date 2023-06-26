<?php

namespace App\Forms\Message;

use \App\Core\Validator;

class Show extends Validator
{
    public $method = "GET";
    protected array $config = [];
    


    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method"  => $this->method,
                "action"  => "",
                "id"      => "message-form",
                "class"   => "form",
                "enctype" => "multipart/form-data",
                "submit"  => "Envoyé votre message"
            ],
            "inputs" => [
                "object" => [
                    "id"          => "message-form-object",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre object",
                    "type"        => "text",
                    "tag"         => "input",
                    "error"       => "Votre object est incorrect",
                    "required"    => true,
                    "disabled"    => false,
                    "value" => ""
                ],
                "message" => [
                    "id"          => "message-form-message",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre message",
                    "type"        => "",
                    "tag"         => "textarea",
                    "error"       => "Votre message est incorrect",
                    "required"    => true,
                    "disabled"    => false,
                    "value" => ""
                ],
                "firstname" => [
                    "id"          => "message-form-fristname",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre prénom",
                    "type"        => "text",
                    "tag"         => "input",
                    "error"       => "Votre prénom est incorrect",
                    "required"    => true,
                    "disabled"    => false,
                    "value" => ""
                ],
                "lastname" => [
                    "id"          => "message-form-lastname",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre nom",
                    "type"        => "text",
                    "tag"         => "input",
                    "error"       => "Votre nom est incorrect",
                    "required"    => true,
                    "disabled"    => false,
                    "value" => ""
                ],
                "email"    => [
                    "id"          => "message-form-email",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre email",
                    "type"        => "email",
                    "tag"         => "input",
                    "error"       => "Votre email est incorrect",
                    "required"    => true,
                    "disabled"    => false,
                    "value" => ""
                ],
                "categorie"    => [
                    "id"          => "message-form-categorie",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Choisir un type de requête",
                    "type"        => "",
                    "tag"         => "select",
                    "options"     => [
                        "1"   => "Remerciement",
                        "2" => "question général",
                        "3"  => "Autre"
                    ],
                    "error"       => "Votre type de requete est incorrect",
                    "required"    => true,
                    "disabled"    => false,
                    "value" => ""
                ]
            ]
        ];
        return $this->config;
    }
    
    public function setConfig(array $config): void
    {
        $this->config = $config;
    }
}
