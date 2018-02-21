<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 21/02/2018
 * Time: 10:59
 */

namespace App\Repositories;


use App\Models\RecoveryPassword;

class RecoveryPasswordRepository
{
    /**
     * @return RecoveryPassword
     */
    public function getModel()
    {
        return (new RecoveryPassword());
    }

    /**
     * @param array $values
     * @return mixed
     */
    public function create(array $values)
    {
        return $this->getModel()
            ->create($values);
    }

}