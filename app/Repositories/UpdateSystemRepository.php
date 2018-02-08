<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 08/02/2018
 * Time: 17:16
 */

namespace App\Repositories;


use App\Models\UpdateSystem;
use Carbon\Carbon;

class UpdateSystemRepository
{
    /**
     * @return UpdateSystem
     */
    public function getModel()
    {
        return (new UpdateSystem());
    }

    /**
     * @param $type
     * @return mixed
     */
    public function updateByType($type)
    {
        return $this->getModel()
            ->where('type_update', $type)
            ->get()
            ->first()
            ->update(['updated_at' => Carbon::create()]);
    }

}