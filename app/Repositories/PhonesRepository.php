<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 02/03/2018
 * Time: 10:59
 */

namespace App\Repositories;


use App\Models\Phone;

class PhonesRepository
{
    /**
     * @return Phone
     */
    public function getModel()
    {
        return (new Phone());
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->getModel()
            ->select('phone')
            ->get();
    }

}