<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdministrativeAuthService;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function authenticate(Request $request)
    {
        $args = $request->all();

        $service = (new AdministrativeAuthService());
        $attempt = $service->attempt($args['username'], $args['password']);
        if (!$attempt) {
            $loginRoute = route('auth.login');
            return redirect($loginRoute);
        }

        $redirect = route('home');
        return redirect($redirect);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        $service = (new AdministrativeAuthService());
        $service->deauthenticate();
        return redirect('auth/login');
    }
}