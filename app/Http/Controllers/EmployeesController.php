<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeesRepository;

class EmployeesController extends Controller
{
    public function all()
    {

    }

    public function view($id)
    {

        $employee = (new EmployeesRepository())->find($id);
        return view('pages.employee.details')
            ->withEmployee($employee);
    }
}