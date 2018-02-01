<?php

namespace App\Repositories;

use App\Models\Config;

class ConfigsRepository
{
    /**
     * @return Config
     */
    public function getModel()
    {
        return (new Config());
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
     * @return mixed
     */
    public function getConfig()
    {
        $user = session('user');
        return $this->getModel()
            ->where('id', $user['empresa'])
            ->get()
            ->first();
    }

}