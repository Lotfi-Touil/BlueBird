<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;

class AdminAccountSetupController extends Controller
{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function createUserAction()
    {
        $post = $this->getRequest()->getPost();

        $username = $post->adminUsername;
        $password = $post->adminPassword;

        // Ici, ajoutez le code pour créer le compte utilisateur avec les informations reçues.
        // ...

        header('Content-Type: application/json');
        echo json_encode(['success' => true]); // ou false en cas d'échec
    }

<<<<<<< develop
    public function getStructureAction()
=======
    public function getFormStructureAction()
>>>>>>> Installeur JS : V1
    {
        $formStructure = [
            "type" => "form",
            "attributes" => [
                "method" => "POST",
                "action" => "#",
                "class" => "form-group container mt-5"
            ],
            "children" => [
                [
                    "type" => "div",
                    "attributes" => ["class" => "form-group"],
                    "children" => [
                        [
                            "type" => "label",
                            "attributes" => [
                                "for" => "adminUsername",
                                "class" => "form-label"
                            ],
                            "children" => ["Nom d'utilisateur"]
                        ],
                        [
                            "type" => "input",
                            "attributes" => [
                                "class" => "form-control",
                                "type" => "text",
                                "id" => "adminUsername",
                                "name" => "adminUsername",
                                "class" => "form-control"
                            ]
                        ]
                    ]
                ],
                [
                    "type" => "div",
                    "attributes" => ["class" => "form-group"],
                    "children" => [
                        [
                            "type" => "label",
                            "attributes" => [
                                "for" => "adminPassword",
                                "class" => "form-label"
                            ],
                            "children" => ["Mot de passe"]
                        ],
                        [
                            "type" => "input",
                            "attributes" => [
                                "class" => "form-control",
                                "type" => "password",
                                "id" => "adminPassword",
                                "name" => "adminPassword",
                                "class" => "form-control"
                            ]
                        ]
                    ]
                ],
                [
                    "type" => "div",
                    "attributes" => ["class" => "form-group"],
                    "children" => [
                        [
                            "type" => "input",
                            "attributes" => [
                                "type" => "submit",
                                "value" => "Terminer",
                                "class" => "btn btn-primary"
                            ]
                        ]
                    ]
                ]
            ]
        ];

        header('Content-Type: application/json');
        echo json_encode($formStructure);
    }

<<<<<<< develop
}
=======
}
>>>>>>> Installeur JS : V1
