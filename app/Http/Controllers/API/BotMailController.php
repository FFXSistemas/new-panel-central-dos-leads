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
        $server = new Server(env('BOT_MAIL_SERVER'), 143);
        $server->setAuthentication(env('BOT_MAIL_LOGIN'), env('BOT_MAIL_PASS'));

        /** @var Message[] $message */
        $messages = $server->getOrderedMessages(SORTDATE,1, 30   );
        foreach ($messages as $message){
            $subject = str_replace("RE: SOLICITAÇÃO ALÇADA FIBER SIEBEL - SIEBEL PÓS - PEDIDO PEGASUS - ", "", $message->getSubject());
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

    /**
     * @param EmailsRepository $repository
     */
    public function getDivergence(EmailsRepository $repository)
    {
        $server = new Server(env('BOT_MAIL_SERVER'), 143);
        $server->setAuthentication(env('BOT_MAIL_LOGIN'), env('BOT_MAIL_PASS'));

        /** @var Message[] $message */
        $messages = $server->getOrderedMessages(SORTDATE,1, 30   );
        foreach ($messages as $message){
            $subject = str_replace("RE: DIVERGÊNCIA CADASTRAL - SIEBEL PÓS - PEDIDO PEGASUS - ", "", $message->getSubject());
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

    /**
     * @param EmailsRepository $repository
     */
    public function getSchedules(EmailsRepository $repository)
    {
        $server = new Server(env('BOT_MAIL_SERVER'), 143);
        $server->setAuthentication(env('BOT_SCHEDULE_LOGIN'), env('BOT_SCHEDULE_PASS'));
        /** @var Message[] $message */
        $messages = $server->getOrderedMessages(SORTDATE,1, 30   );
        foreach ($messages as $message){
            $subject = str_replace("RES: AGENDAMENTO - ", "", $message->getSubject());
            var_dump($subject);

            $search = 'Sua solicitação foi atendida com sucesso';
            $search2 = 'Liberado';
            $search3 = 'Feito';
            $found = strpos_recursive($message->getMessageBody(), $search);
            $found2 = strpos_recursive($message->getMessageBody(), $search2);
            $found3 = strpos_recursive($message->getMessageBody(), $search3);

            if($found) {
                $values = [
                    "body" => $message->getMessageBody(),
                    "status" => "APROVADO"
                ];
                $repository->updateByScheduledOrder($subject, $values );
            } else if($found2){
                $values = [
                    "body" => $message->getMessageBody(),
                    "status" => "APROVADO"
                ];
                $repository->updateByScheduledOrder($subject, $values );
            }else if($found3){
                $values = [
                    "body" => $message->getMessageBody(),
                    "status" => "APROVADO"
                ];
                $repository->updateByScheduledOrder($subject, $values );
            } else {
                $values = [
                    "body" => $message->getMessageBody(),
                    "status" => "REPROVADO"
                ];
                $repository->updateByScheduledOrder($subject, $values );
            }

            $subject1 = str_replace("RE: AGENDAMENTO - ", "", $message->getSubject());

            $search = 'Sua solicitação foi atendida com sucesso';
            $search2 = 'Liberado';
            $search3 = 'Feito';
            $found = strpos_recursive($message->getMessageBody(), $search);
            $found2 = strpos_recursive($message->getMessageBody(), $search2);
            $found3 = strpos_recursive($message->getMessageBody(), $search3);

            if($found) {
                $values = [
                    "body" => $message->getMessageBody(),
                    "status" => "APROVADO"
                ];
                $repository->updateByScheduledOrder($subject1, $values );
            } else if($found2){
                $values = [
                    "body" => $message->getMessageBody(),
                    "status" => "APROVADO"
                ];
                $repository->updateByScheduledOrder($subject1, $values );
            }else if($found3){
                $values = [
                    "body" => $message->getMessageBody(),
                    "status" => "APROVADO"
                ];
                $repository->updateByScheduledOrder($subject1, $values );
            } else {
                $values = [
                    "body" => $message->getMessageBody(),
                    "status" => "REPROVADO"
                ];
                $repository->updateByScheduledOrder($subject1, $values );
            }
            echo 'Subject: '.$subject.''.PHP_EOL; echo "<br>";
            echo 'Body: '.$message->getMessageBody().''. PHP_EOL; echo "<br>";
        }

        $update = (new UpdateSystemRepository())->updateByType('roboc_schedule');
        dd($update);
    }
}