<?php

namespace App\Requests;

use App\Models\Menu;
use App\Core\FormRequest;

class MenuRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct($this->rules());
    }

    protected function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:60',
            'slug' => 'required|string|max:60',
            'orders' => 'required|integer',
            // 'id_parent' => 'integer',
            'status' => 'in:0,1',
        ];

        return $rules;

        return $rules;
    }


    protected function messages(): array
    {
        return [
            'title.required' => 'Le champ title est requis.',
            'title.string' => 'Le champ title doit être une chaîne de caractères.',
            'title.max' => 'Le champ title ne doit pas dépasser 60 caractères.',
            'slug.required' => 'Le champ slug est requis.',
            'slug.string' => 'Le champ slug doit être une chaîne de caractères.',
            'slug.max' => 'Le champ slug ne doit pas dépasser 60 caractères.',
            'orders.required' => 'Le champ test est requis.',
            'orders.integer' => 'Le champ test doit être un entier.',
            // 'id_parent.integer' => 'Le champ test doit être un entier.',
            'status.integer' => 'Le champ status doit être un booléen.',
        ];
    }

    public function createMenu(): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }
        if($validatedData['id_parent'] === 0){
            $validatedData['id_parent'] = null;
        }

        $menu = new Menu();
        $menu->setTitle($validatedData['title']);
        $menu->setSlug($validatedData['slug']);
        $menu->setOrders(intval($validatedData['orders']));
        $menu->setParent($validatedData['id_parent']);
        $menu->setStatus($validatedData['status']);
        $menu->create();

        return true;
    }

    public function updateMenu(Menu $menu): bool
    {
        $isCreating = false;

        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $menu->setTitle($validatedData['title']);
        $menu->setSlug($validatedData['slug']);
        $menu->setOrders($validatedData['orders']);
        $menu->setParent($validatedData['id_parent']);
        $menu->setStatus($validatedData['status']);
        $menu->update();

        return true;
    }
}
