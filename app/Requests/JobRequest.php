<?php

namespace App\Requests;

use App\Models\Job;
use App\Core\FormRequest;

class JobRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct($this->rules());
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Le champ nom est requis.',
            'name.string' => 'Le champ nom doit être une chaîne de caractères.',
            'name.max' => 'Le champ nom ne doit pas dépasser 255 caractères.',
        ];
    }

    public function createJob(): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $job = new Job();
        $job->setName($validatedData['name']);
        $job->create();

        return true;
    }

    public function updateJob(Job $job): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $job->setName($validatedData['name']);
        $job->update();

        return true;
    }
}
