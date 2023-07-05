<?php

namespace App\Controllers;

use App\Core\QueryBuilder;
use App\Models\Staff;
use App\Models\Job;
use App\Requests\StaffRequest;

class StaffController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listAction(): void
    {
        view('staff/back/list', 'back', [
            'staffs' => Staff::all()
        ]);
    }

    public function createAction(): void
    {
        view('staff/back/create', 'back', [
            'jobs' => Job::all()
        ]);
    }

    public function storeAction(): void
    {
        $request = new StaffRequest();

        if (!$request->createStaff()) {
            view('staff/back/create', 'back', [
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function showAction($id): void
    {
        $staff = Staff::find($id);
        $staffJobs = QueryBuilder::table('staff_job')
            ->select('*')
            ->where('id_staff', $id)
            ->get();
        $staffJobs = array_values(array_column($staffJobs, 'id_job'));

        if (!$staff)
            $this->redirectToList();

        view('staff/back/show', 'back', [
            'staff' => $staff,
            'staffJobs' => $staffJobs,
            'jobs' => Job::all()
        ]);
    }

    public function editAction($id): void
    {
        $staff = Staff::find($id);
        $staffJobs = QueryBuilder::table('staff_job')
            ->select('*')
            ->where('id_staff', $id)
            ->get();
        $staffJobs = array_values(array_column($staffJobs, 'id_job'));

        if (!$staff)
            $this->redirectToList();

        view('staff/back/edit', 'back', [
            'staff' => $staff,
            'staffJobs' => $staffJobs,
            'jobs' => Job::all()
        ]);
    }

    public function updateAction($id): void
    {
        $staff = Staff::find($id);

        if (!$staff) {
            $this->redirectToList();
        }

        $request = new StaffRequest();

        if (!$request->updateStaff($staff)) {
            view('staff/back/edit', 'back', [
                'staff'   => $staff,
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function deleteAction($id): void
    {
        $staff = Staff::find($id);

        if ($staff) {
            $staff->delete();
        }

        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/staff/list');
        exit();
    }
}