<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdministrativeAuthService
{
    /**
     * @var UsersRepository
     */
    private $repository;

    /**
     * AdministrativeAuthService constructor.
     */
    public function __construct()
    {
        $this->repository = new UsersRepository();
    }

    public function attempt($username, $password)
    {
        $find = $this->repository->findByUserAndPassword($username, $password);

        if (!$find->count())
            return false;

        return $this->authenticateWithModel($find->first());
    }

    public function authenticateWithModel(User $user)
    {
        \session(['user' => $user]);
        return true;
    }

    /**
     * @return bool
     */
    public function deauthenticate()
    {
        Session::flush();
        return true;
    }


}