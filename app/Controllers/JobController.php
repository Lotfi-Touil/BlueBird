<?php

namespace App\Controllers;

use App\Models\Job;
use App\Forms\Job\Create;
use App\Forms\Job\Edit;
use App\Requests\JobRequest;

class JobController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listAction(): void
    {
        view('job/back/list', 'back', [
            'jobs' => Job::all()
        ]);
    }

    public function createAction(): void
    {
        $form = new Create();
        view('job/back/create', 'back', [
            'form' => $form->getConfig()
        ]);
    }

    public function storeAction(): void
    {
        $request = new JobRequest();

        if (!$request->createJob()) {
            view('job/back/create', 'back', [
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function showAction($id): void
    {
        $job = Job::find($id);

        if (!$job)
            $this->redirectToList();

        view('job/back/show', 'back', [
            'job' => $job
        ]);
    }

    public function editAction($id): void
    {
        $job = Job::find($id);

        if (!$job)
            $this->redirectToList();

        view('job/back/edit', 'back', [
            'job' => $job
        ]);
    }

    public function updateAction($id): void
    {
        $job = Job::find($id);

        if (!$job) {
            $this->redirectToList();
        }

        $request = new JobRequest();

        if (!$request->updateJob($job)) {
            view('job/back/edit', 'back', [
                'job'   => $job,
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function deleteAction($id): void
    {
        $job = Job::find($id);

        if ($job) {
            $job->delete();
        }

        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/job/list');
        exit();
    }
}