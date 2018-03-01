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

    public function store()
    {

    }

    public function update()
    {

    }

    public function find()
    {

    }

}