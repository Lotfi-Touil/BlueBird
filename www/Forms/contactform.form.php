<?php

namespace App\Forms;

use \App\Core\Validator;

class ContactForm extends Validator
{
    public $method = "POST";
    protected array $config = [];

    public function getConfig(): array
    {
        $this->config = [
            "config" => [
                "method"  => $this->method,
                "action"  => "",
                "id"      => "contact-form",
                "class"   => "form",
                "enctype" => "",
                "submit"  => "Envoyé votre message"
            ],
            "inputs" => [
                "object" => [
                    "id"          => "contact-form-object",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre object",
                    "type"        => "text",
                    "error"       => "Votre object est incorrect",
                    "required"    => true
                ],
                "firstname" => [
                    "id"          => "contact-form-fristname",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre prénom",
                    "type"        => "text",
                    "error"       => "Votre prénom est incorrect",
                    "required"    => true
                ],
                "lastname" => [
                    "id"          => "contact-form-lastname",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre nom",
                    "type"        => "text",
                    "error"       => "Votre nom est incorrect",
                    "required"    => true
                ],
                "email"    => [
                    "id"          => "contact-form-email",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre email",
                    "type"        => "text",
                    "error"       => "Votre email est incorrect",
                    "required"    => true
                ],
                "message" => [
                    "id"          => "contact-form-message",
                    "class"       => "form-input form-control form-control-message",
                    "placeholder" => "Votre message",
                    "type"        => "text",
                    "error"       => "Votre message est incorrect",
                    "required"    => true
                ]
            ]
        ];
        return $this->config;
    }
}
