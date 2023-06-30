<?php

namespace App\Requests;

use App\Models\Productor;
use App\Core\FormRequest;

class ProductorRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct($this->rules());
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Le champ titre est requis.',
            'name.string' => 'Le champ titre doit être une chaîne de caractères.',
            'name.max' => 'Le champ titre ne doit pas dépasser 255 caractères.',
            'description.required' => 'Le champ contenu est requis.',
            'description.string' => 'Le champ contenu doit être une chaîne de caractères.',
        ];
    }

    public function createProductor(): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $productor = new Productor();
        $productor->setName($validatedData['name']);
        $productor->setDescription($validatedData['description']);
        $productor->create();

        return true;
    }

    public function updateProductor(Productor $productor): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $productor->setName($validatedData['name']);
        $productor->setDescription($validatedData['description']);
        $productor->update();

        return true;
    }
}
