<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 31/01/2018
 * Time: 13:59
 */

namespace App\Repositories;


use App\Models\Plan;

class PlansRepository
{
    /**
     * @return Plan
     */
    public function getModel()
    {
        return (new Plan());
    }

    /**
     * @return mixed
     */
    public function activePlans()
    {
        return $this->getModel()
            ->where('active', 1)
            ->get();
    }

    /**
     * @return mixed
     */
    public function allPlans()
    {
        return $this->getModel()
            ->get();
    }
}