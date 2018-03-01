<?php


namespace App\Repositories;


use App\Models\SendSms;

class SmsRepository
{
    /**
     * @return SendSms
     */
    public function getModel()
    {
        return (new SendSms());
    }

    /**
     * @param array $values
     * @return mixed
     */
    public function store(array $values)
    {
        return $this->getModel()
            ->create($values);
    }

    public function update()
    {

    }

    public function find()
    {

    }

}