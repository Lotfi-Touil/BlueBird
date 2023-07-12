<?php

namespace App\Requests;

use App\Core\FormRequest;
use App\Models\Page;

class PageRequest extends FormRequest
{
    public function __construct()
    {
        parent::__construct($this->rules());
    }

    protected function rules(): array
    {
        return [
            'header_title' => 'required|string',
            'header_description' => 'required|string',
            'main_title' => 'required|string',
            'main_content' => 'required|string',
            'sidebar_title' => 'required|string',
            'sidebar_content' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'header_title.required' => 'Le champ titre d\'en-tête est requis.',
            'header_title.string' => 'Le champ titre d\'en-tête doit être une chaîne de caractères.',
            'header_title.max' => 'Le champ titre d\'en-tête ne doit pas dépasser 255 caractères.',

            'header_description.required' => 'Le champ description d\'en-tête est requis.',
            'header_description.string' => 'Le champ description d\'en-tête doit être une chaîne de caractères.',

            'main_title.required' => 'Le champ titre principal est requis.',
            'main_title.string' => 'Le champ titre principal doit être une chaîne de caractères.',
            'main_title.max' => 'Le champ titre principal ne doit pas dépasser 255 caractères.',

            'main_content.required' => 'Le champ contenu principal est requis.',
            'main_content.string' => 'Le champ contenu principal doit être une chaîne de caractères.',

            'sidebar_title.required' => 'Le champ titre de la barre latérale est requis.',
            'sidebar_title.string' => 'Le champ titre de la barre latérale doit être une chaîne de caractères.',
            'sidebar_title.max' => 'Le champ titre de la barre latérale ne doit pas dépasser 255 caractères.',

            'sidebar_content.required' => 'Le champ contenu de la barre latérale est requis.',
            'sidebar_content.string' => 'Le champ contenu de la barre latérale doit être une chaîne de caractères.',
        ];
    }

    public function createPage(): bool
    {
        $validatedData = $this->validate();

        if (!$validatedData) {
            return false;
        }

        $page = new Page();
        // $page->setSlug($validatedData['slug']);
        $page->setHeaderTitle($validatedData['header_title']);
        $page->setHeaderDescription($validatedData['header_description']);
        $page->setMainTitle($validatedData['main_title']);
        $page->setMainContent($validatedData['main_content']);
        $page->setSidebarTitle($validatedData['sidebar_title']);
        $page->setSidebarContent($validatedData['sidebar_content']);
        $page->create();
    
        return true;
    }

    public function updatePage($page): bool
    {
        $validatedData = $this->validate();
    
        if (!$validatedData) {
            return false;
        }

        // $page->setSlug($validatedData['slug']);
        $page->setHeaderTitle($validatedData['header_title']);
        $page->setHeaderDescription($validatedData['header_description']);
        $page->setMainTitle($validatedData['main_title']);
        $page->setMainContent($validatedData['main_content']);
        $page->setSidebarTitle($validatedData['sidebar_title']);
        $page->setSidebarContent($validatedData['sidebar_content']);
        $page->update();
    
        return true;
    }    
}
