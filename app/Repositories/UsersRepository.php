<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    public function getModel()
    {
        return (new User());
    }

    /**
     * @param $user
     * @param $password
     * @return mixed
     */
    public function findByUserAndPassword($user, $password)
    {
        return $this->getModel()
            ->where('login', $user)
            ->where('password', md5($password))
            ->get();
    }

    /**
     * @param int $level
     * @return mixed
     */
    public function getUsersByLevel($level = 1)
    {
        return $this->getModel()
            ->where('level', $level)
            ->where('active', 1)
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getHookBySupervisor($id)
    {
        return $this->getModel()
            ->where('id', $id)
            ->first();
    }


}