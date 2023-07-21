<?php

namespace App\Requests;

use App\Core\FormRequest;
use App\Models\DatabaseModel;

class DatabaseRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct($this->rules());
    }

    protected function rules(): array
    {
        return [
            'dbName' => 'required|string|min:3|max:60',
            'dbUser' => 'required|string|min:3|max:60',
            'dbPassword' => 'required|string|min:8|max:200',
        ];
    }

    protected function messages(): array
    {
        return [
            'dbName.required' => 'Le nom de la base de données est requis.',
            'dbName.string' => 'Le nom de la base de données doit être une chaîne de caractères.',
            'dbName.max' => 'Le nom de la base de données ne doit pas dépasser 60 caractères.',
            'dbName.min' => 'Le nom de la base de données doit contenir au moins 3 caractères.',
            'dbUser.required' => 'Le nom d\'utilisateur est requis.',
            'dbUser.string' => 'Le nom d\'utilisateur doit être une chaîne de caractères.',
            'dbUser.max' => 'Le nom d\'utilisateur ne doit pas dépasser 60 caractères.',
            'dbPassword.required' => 'Le mot de passe est requis.',
            'dbPassword.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'dbPassword.max' => 'Le mot de passe ne doit pas dépasser 200 caractères.',
        ];
    }

    public function createDatabase(): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        return true; // TODO

        $databaseModel = new DatabaseModel($validatedData['dbName'], $validatedData['dbUser'], $validatedData['dbPassword']);
        $databaseCreated = $databaseModel->createDatabase();
    
        return $databaseCreated;
    }
}