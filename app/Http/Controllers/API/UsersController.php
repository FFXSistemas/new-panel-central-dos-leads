<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Repositories\RecoveryPasswordRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mailgun\Mailgun;

class UsersController extends Controller
{
    /**
     * @param Request $request
     * @return array
     * @throws \Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters
     * @throws \Throwable
     */
    public function recoveryEmail(Request $request)
    {
        $args = $request->all();
        $user = (new UsersRepository())->findByEmail($args['email']);

        if($user){
            $mgClient = new Mailgun('key-2dde12b672e70384e927810d92eab93a');
            $domain = "suporte.centraldosleads.com.br";
            $token = base64_encode($user->email);
            $template = view('templates.emails.recovery', ['token' => md5($token)])->render();
            $recovery = (new RecoveryPasswordRepository())->create([
                'token' => md5(Carbon::create()->format('Y-m-d H:i:s')),
                'active' => '1',
                'user_id' => $user->id
            ]);
            $result = $mgClient->sendMessage("$domain",
                array('from'    => 'Central dos Leads <atendimento@centraldosleads.com.br>',
                    'to'      => $user->email,
                    'subject' => 'Solicitação de Reset de senha.',
                    'html'    => $template));
            return [
                'success' => true,
            ];
        }
        return [
            'success' => false,
            'alert' => 'Usuário não encontrado. Por favor verifique o email e tente novamente.'
        ];
    }
}