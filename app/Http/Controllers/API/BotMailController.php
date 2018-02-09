<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 07/02/2018
 * Time: 22:29
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\UpdateSystem;
use App\Repositories\EmailsRepository;
use App\Repositories\UpdateSystemRepository;
use Fetch\Server;
use Fetch\Message;

class BotMailController extends Controller
{
    public function getCrivo(EmailsRepository $repository)
    {
        $server = new Server('correio.pronorth.com.br', 143);
        $server->setAuthentication('backoffice-tele@pronorth.com.br', 'pronorth@2017');

        /** @var Message[] $message */
        $messages = $server->getOrderedMessages(SORTDATE,1, 30   );
        foreach ($messages as $message){
            $subject = str_replace("RE: SOLICITAÇÃO ALÇADA FIBER SIEBEL - PEDIDO PEGASUS - ", "", $message->getSubject());
            var_dump($subject);

            if(is_numeric($subject)) {
                $search = 'Sua solicitação foi atendida com sucesso';
                $search2 = 'Liberado';
                $search3 = 'Atualizado';
                $found = strpos_recursive($message->getMessageBody(), $search);
                $found2 = strpos_recursive($message->getMessageBody(), $search2);
                $found3 = strpos_recursive($message->getMessageBody(), $search3);

                if($found) {
                    $values = [
                        "body" => $message->getMessageBody(),
                        "status" => "APROVADO"
                    ];
                    $repository->updateByOrder($subject, $values );
                } else if($found2){
                    $values = [
                        "body" => $message->getMessageBody(),
                        "status" => "APROVADO"
                    ];
                    $repository->updateByOrder($subject, $values );
                }else if($found3){
                    $values = [
                        "body" => $message->getMessageBody(),
                        "status" => "APROVADO"
                    ];
                    $repository->updateByOrder($subject, $values );
                } else {
                    $values = [
                        "body" => $message->getMessageBody(),
                        "status" => "REPROVADO"
                    ];
                    $repository->updateByOrder($subject, $values );
                }
            }
            echo 'Subject: '.$subject.''.PHP_EOL; echo "<br>";
            echo 'Body: '.$message->getMessageBody().''. PHP_EOL; echo "<br>";
        }

       $update = (new UpdateSystemRepository())->updateByType('roboc_crivo');
       dd($update);
    }
}