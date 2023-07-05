<?php

namespace App\Requests;

use App\Models\User;
use App\Core\FormRequest;

class UserRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct($this->rules());
    }

    protected function rules(): array
    {   
        $rules = [
            'firstname' => 'required|string|max:60',
            'lastname' => 'required|string|max:60',
            'email' => 'required|string|max:100',
            'status' => 'in:0,1',
        ];
        if ($this->$isCreating) {
            $rules['password'] = 'required|string|max:50';
            $rules['confirmPassword'] = 'required|string|max:50|same:password';
        }
    
        return $rules;
    
        return $rules;
    }
        

    protected function messages(): array
    {
        return [
            'firstname.required' => 'Le champ firstname est requis.',
            'firstname.string' => 'Le champ firstname doit être une chaîne de caractères.',
            'firstname.max' => 'Le champ firstname ne doit pas dépasser 60 caractères.',
            'lastname.required' => 'Le champ lastname est requis.',
            'lastname.string' => 'Le champ lastname doit être une chaîne de caractères.',
            'lastname.max' => 'Le champ lastname ne doit pas dépasser 60 caractères.',
            'email.required' => 'Le champ email est requis.',
            'email.string' => 'Le champ email doit être une chaîne de caractères.',
            'email.max' => 'Le champ email ne doit pas dépasser 100 caractères.',
            'password.string' => 'Le champ password doit être une chaîne de caractères.',
            'password.max' => 'Le champ password ne doit pas dépasser 50 caractères.',
            'confirmPassword.same' => 'Le champ confirmPassword doit être le même que le password',
            'confirmPassword.string' => 'Le champ confirmPassword doit être une chaîne de caractères.',
            'confirmPassword.max' => 'Le champ confirmPassword ne doit pas dépasser 50 caractères.',
            'status.integer' => 'Le champ status doit être un booléen.',
        ];
    }

    public function createUser(): bool
    {
        $isCreating = true;
        $validatedData = $this->validate();
        if (!$validatedData) {
            return false;
        }
       
        $user = new User();
        $user->setFirstname($validatedData['firstname']);
        $user->setLastname($validatedData['lastname']);
        $user->setEmail($validatedData['email']);
        $user->setPassword($validatedData['password']);
        $user->setStatus($validatedData['status']);
        $user->create();
    
        return true;
    }
    
    public function updateUser(User $user): bool
    {   
        $isCreating = false;

        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $user->setFirstname($validatedData['firstname']);
        $user->setLastname($validatedData['lastname']);
        $user->setEmail($validatedData['email']);
        $user->setStatus($validatedData['status']);
        $user->update();
    
        return true;
    }
}
