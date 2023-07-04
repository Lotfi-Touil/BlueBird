<?php

namespace App\Controllers;

use App\Core\QueryBuilder;
use App\Models\Productor;
use App\Forms\Productor\Create;
use App\Forms\Productor\Edit;
use App\Models\Country;
use App\Requests\ProductorRequest;

class ProductorController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function listAction(): void
    {
        $productors = QueryBuilder::table('productor')
            ->select(
                'productor.id AS productor_id',
                'productor.name AS productor_name',
                'productor.*',
                'country.id AS country_id',
                'country.name AS country_name',
                'country.*',
                )
            ->join('country', 'productor.id_country', '=', 'country.id')
            ->orderBy('productor.name')
            ->get();

        view('productor/back/list', 'back', [
            'productors' => $productors
        ]);
    }

    public function createAction(): void
    {
        $countries = Country::all();

        view('productor/back/create', 'back', [
            'countries' => $countries
        ]);
    }

    public function storeAction(): void
    {
        $request = new ProductorRequest();

        if (!$request->createProductor()) {
            view('productor/back/create', 'back', [
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function showAction($id): void
    {
        $productor = QueryBuilder::table('productor')
            ->select(
                'productor.id AS productor_id',
                'productor.name AS productor_name',
                'productor.*',
                'country.id AS country_id',
                'country.name AS country_name',
                'country.*',
                )
            ->join('country', 'productor.id_country', '=', 'country.id')
            ->where('productor.id', $id)
            ->first();

        if (!$productor)
            $this->redirectToList();

        view('productor/back/show', 'back', [
            'productor' => $productor
        ]);
    }

    public function editAction($id): void
    {
        $productor = QueryBuilder::table('productor')
            ->select(
                'productor.id AS productor_id',
                'productor.name AS productor_name',
                'productor.*',
                'country.id AS country_id',
                'country.*',
                )
            ->join('country', 'productor.id_country', '=', 'country.id')
            ->where('productor.id', $id)
            ->first();

        $countries = Country::all();

        if (!$productor)
            $this->redirectToList();

        view('productor/back/edit', 'back', [
            'productor' => $productor,
            'countries'   => $countries
        ]);
    }

    public function updateAction($id): void
    {
        $productor = QueryBuilder::table('productor')
            ->select(
                'productor.id AS productor_id',
                'productor.name AS productor_name',
                'productor.*',
                'country.id AS country_id',
                'country.*',
                )
            ->join('country', 'productor.id_country', '=', 'country.id')
            ->where('productor.id', $id)
            ->first();

        if (!$productor) {
            $this->redirectToList();
        }

        $options = Country::all();

        $request = new ProductorRequest();

        if (!$request->updateProductor($productor)) {
            view('productor/back/edit', 'back', [
                'productor' => $productor,
                'options'   => $options,
                'errors'    => $request->getErrors(),
                'old'       => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function deleteAction($id): void
    {
        $productor = Productor::find($id);

        if ($productor) {
            $productor->delete();
        }

        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/productor/list');
        exit();
    }
}