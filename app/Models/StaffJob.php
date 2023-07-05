<?php

namespace App\Models;

use App\Core\Model;

class StaffJob extends Model
{
    protected static $table = DB_PREFIX . 'staff_job';
    protected static $fillable = ['id_staff', 'id_job'];

    protected $id;

    protected $id_staff;
    protected $id_job;

    public function getId() {
        return $this->id;
    }

    public function getIdStaff() {
        return $this->id_staff;
    }

    public function setIdStaff($id_staff) {
        $this->id_staff = $id_staff;
    }

    public function getIdJob() {
        return $this->id_job;
    }

    public function setIdJob($id_job) {
        $this->id_job = $id_job;
    }

    public function getStaff() {
        return Staff::find($this->id_staff);
    }

    public function getJob() {
        return Job::find($this->id_job);
    }
}
