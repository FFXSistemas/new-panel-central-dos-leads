<?php


namespace App\Http\Controllers;


use App\Repositories\LeadsRepository;

class LeadsController extends Controller
{
    /**
     * @param LeadsRepository $repository
     * @return mixed
     */
    public function all(LeadsRepository $repository)
    {
        $leads = $repository->leadsTable();
        $employee = session('user')['employee_id'];
        return view('pages.leads.all')
            ->withLeads($leads)
            ->withEmployee($employee);
    }
}