<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 30/01/2018
 * Time: 16:39
 */

namespace App\Repositories;


use App\Models\Email;

class EmailsRepository
{
    /**
     * @return Email
     */
    public function getModel()
    {
        return (new Email());
    }

    /**
     * @return mixed
     */
    public function emailsTable()
    {
        $user = session('user');
        if($user['nivel'] == 1){
            return $this->getModel()
                ->select('id', 'date', 'user', 'name', 'cpf', 'order_pegasus', 'plan_wan', 'plan_phone', 'state', 'model', 'status', 'new_status')
                ->where('user', $user['name'])
                ->orderBy('id', 'desc')
                ->paginate(10);
        }
        return $this->getModel()
            ->select('id', 'date', 'user', 'name', 'cpf', 'order_pegasus', 'plan_wan', 'plan_phone', 'state', 'model', 'status', 'new_status')
            ->orderBy('id', 'desc')
            ->paginate(10);
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

    public function update($id, array $values)
    {
        $email = $this->find($id);
        $email->update($values);
    }

}