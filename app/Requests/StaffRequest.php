<?php

namespace App\Requests;

use App\Models\Staff;
use App\Models\StaffJob;
use App\Core\FormRequest;
use App\Core\QueryBuilder;

class StaffRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct($this->rules());
    }

    protected function rules(): array
    {
        return [
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'birthdate' => 'required|string|max:50',
            'birthplace' => 'required|string|max:50',
            'nationality' => 'required|string|max:50',
            'biography' => 'required|string|max:2000',
        ];
    }

    protected function messages(): array
    {
        return [
            'firstname.required' => 'Le champ prénom est requis.',
            'firstname.string' => 'Le champ prénom doit être une chaîne de caractères.',
            'firstname.max' => 'Le champ prénom ne doit pas dépasser 50 caractères.',

            'lastname.required' => 'Le champ nom est requis.',
            'lastname.string' => 'Le champ nom doit être une chaîne de caractères.',
            'lastname.max' => 'Le champ nom ne doit pas dépasser 50 caractères.',

            'birthdate.required' => 'Le champ date de naissance est requis.',
            'birthdate.string' => 'Le champ date de naissance doit être une chaîne de caractères.',
            'birthdate.max' => 'Le champ date de naissance ne doit pas dépasser 50 caractères.',

            'birthplace.required' => 'Le champ lieu de naissance est requis.',
            'birthplace.string' => 'Le champ lieu de naissance doit être une chaîne de caractères.',
            'birthplace.max' => 'Le champ lieu de naissance ne doit pas dépasser 50 caractères.',

            'nationality.required' => 'Le champ nationalité est requis.',
            'nationality.string' => 'Le champ nationalité doit être une chaîne de caractères.',
            'nationality.max' => 'Le champ nationalité ne doit pas dépasser 50 caractères.',

            'biography.required' => 'Le champ biographie est requis.',
            'biography.string' => 'Le champ biographie doit être une chaîne de caractères.',
            'biography.max' => 'Le champ biographie ne doit pas dépasser 2000 caractères.',
        ];
    }

    public function createStaff(): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $staff = new Staff();
        $staff->setFirstname($validatedData['firstname']);
        $staff->setLastname($validatedData['lastname']);
        $staff->setBirthdate($validatedData['birthdate']);
        $staff->setBirthplace($validatedData['birthplace']);
        $staff->setNationality($validatedData['nationality']);
        $staff->setBiography($validatedData['biography']);
        $staffId = $staff->create();

        foreach ($validatedData['jobs'] as $job) {
            $staffJob = new StaffJob();
            $staffJob->setIdStaff($staffId);
            $staffJob->setIdJob($job);
            $staffJob->create();
        }

        return true;
    }

    public function updateStaff(Staff $staff): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $staff->setFirstname($validatedData['firstname']);
        $staff->setLastname($validatedData['lastname']);
        $staff->setBirthdate($validatedData['birthdate']);
        $staff->setBirthplace($validatedData['birthplace']);
        $staff->setNationality($validatedData['nationality']);
        $staff->setBiography($validatedData['biography']);
        $staff->update();

        $deleteStaffJobs = QueryBuilder::table('staff_job')
            ->where('id_staff', '=', $staff->getId())
            ->delete();
        
        if($deleteStaffJobs) {
            foreach ($validatedData['jobs'] as $job) {
                $staffJob = new StaffJob();
                $staffJob->setIdStaff($staff->getId());
                $staffJob->setIdJob($job);
                $staffJob->create();
            }
        }

        return true;
    }
}
