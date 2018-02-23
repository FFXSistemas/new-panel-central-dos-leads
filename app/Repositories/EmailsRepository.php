<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 30/01/2018
 * Time: 16:39
 */

namespace App\Repositories;


use App\Models\Email;
use App\Models\EmailSchedule;

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
     * @return EmailSchedule
     */
    public function getScheduleModel()
    {
        return (new EmailSchedule());
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

    /**
     * @param $id
     * @param array $values
     */
    public function update($id, array $values)
    {
        $email = $this->find($id);
        $email->update($values);
    }

    /**
     * @param $id
     * @param array $values
     */
    public function updateByOrder($id, array $values)
    {
        $id = str_replace(" ", "", $id);

        $email = $this->getModel()
            ->where('order_pegasus', $id)
            ->where('status', "EM ANALISE")
            ->get()
            ->first();

        if($email !=null){
            $ch = curl_init();

            $supervisor = (new UsersRepository())->getHookBySupervisor($email->supervisor_id);

            curl_setopt($ch, CURLOPT_URL, $supervisor->hook);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":\"PEDIDO {$id} - {$values['status']}! - Vendedor:   {$email['user']}\"}");
            curl_setopt($ch, CURLOPT_POST, 1);

            $headers = array();
            $headers[] = "Content-Type: application/x-www-form-urlencoded";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close ($ch);
            $email->update($values);
        }
    }

    /**
     * @param $id
     * @param array $values
     */
    public function updateByScheduledOrder($id, array $values)
    {
        $id = str_replace(" ", "", $id);

        $email = $this->getScheduleModel()
            ->where('number_order', $id)
            ->where('status', "EM ANALISE")
            ->get()
            ->first();

        if($email !=null){
            $ch = curl_init();

            $supervisor = (new UsersRepository())->getHookBySupervisor($email->supervisor_id);

            curl_setopt($ch, CURLOPT_URL, $supervisor->hook);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":\"PEDIDO DE AGENDAMENTO ORDEM - {$id} - {$values['status']}! - Vendedor:   {$email['user']}\"}");
            curl_setopt($ch, CURLOPT_POST, 1);

            $headers = array();
            $headers[] = "Content-Type: application/x-www-form-urlencoded";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close ($ch);
            $email->update($values);
        }
    }
}