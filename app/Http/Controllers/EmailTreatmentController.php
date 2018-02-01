<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 30/01/2018
 * Time: 15:01
 */

namespace App\Http\Controllers;


use App\Repositories\EmailsRepository;
use App\Repositories\PlansRepository;
use Illuminate\Http\Request;

class EmailTreatmentController extends Controller
{
    /**
     * @param EmailsRepository $repository
     * @return mixed
     */
    public function all(EmailsRepository $repository)
    {
        $method = '';
        $emails = $repository->emailsTable();
        $employee = session('user')['nivel'];
        return view('pages.emails.all')
            ->withEmails($emails)
            ->withEmployee($employee)
            ->withMethod($method);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.emails.create');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $email = (new EmailsRepository())->find($id);
        $plans = (new PlansRepository())->allPlans();
        return view('pages.emails.edit')
            ->withEmail($email)
            ->withPlans($plans);
    }

    public function store()
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $values = $request->only(['new_order_pegasus', 'new_status']);
        $repository = (new EmailsRepository())->update($id, $values);
        \Session::flash('flash_message','Tratativa Atualizada com sucesso.');
        return redirect()->route('emails.edit', ['id' => $id]);
    }
}