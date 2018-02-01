<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeesRepository
{
    /**
     * @return Employee
     */
    public function getModel()
    {
        return (new Employee());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->getModel()
            ->where('id', $id)
            ->get()
            ->first();
    }

}