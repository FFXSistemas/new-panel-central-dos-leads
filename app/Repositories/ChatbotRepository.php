<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 28/02/2018
 * Time: 16:52
 */

namespace App\Repositories;


use App\Models\ChatbotInteraction;

class ChatbotRepository
{
    /**
     * @return ChatbotInteraction
     */
    public function getModel()
    {
        return (new ChatbotInteraction());
    }

    /**
     * @param array $args
     * @return mixed
     */
    public function create(array $args)
    {
        return $this->getModel()
            ->create([
                'email' => $args['email'],
                'supplier_name' => $args['supplier_name'],
                'lead_creation' =>  $args['lead_creation_at'],
                'chat_lead' => $args['chat_lead_number'],
                'cep' => $args['qual_o_cep_que_deseja_instalar_a_tim_live'],
                'numero' =>  $args['qual_o_numero_da_residencia_ou_empresa'],
                'email_client' => $args['qual_o_seu_endereo_de_email'],
                'documento' => $args['qual_o_cpf_ou_cnpj_que_pretende_contratar_o_serv'],
                'portabilidade' => $args['voce_gostaria_de_realizar_a_portabilidade_de_seu'],
                'phonefixo' => $args['qual_o_seu_numero_fixo_ou_celular_nao_se_esquea_'],
                'complemento' => $args['qual_o_complemento_se_nao_houver_escreva_nao'],
                'plano' => $args['para_o_seu_endereo_temos_a_seguintes_opoes_de_pl']
            ]);
    }
}