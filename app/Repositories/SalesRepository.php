<?php

namespace App\Repositories;

use App\Models\Sale;
use Carbon\Carbon;

class SalesRepository
{
    /**
     * @return Sale
     */
    public function getModel()
    {
        return (new Sale());
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

    public function getSale($id)
    {
        $user = session('user');

        switch($user['nivel']){
            case 1:
                return $this->getModel()
                    ->where('id', $id)
                    ->where('company_id', $user['empresa'])
                    ->where('vendedor', $user['nome'])
                    ->get()
                    ->first();
                break;

            case 3:
                return $this->getModel()
                    ->where('id', $id)
                    ->where('company_id', $user['empresa'])
                    ->where('supervisor', $user['nome'])
                    ->get()
                    ->first();
                break;

            case 7:
                return $this->getModel()
                    ->where('id', $id)
                    ->where('company_id', $user['empresa'])
                    ->get()
                    ->first();
                break;
        }
    }

    /**
     * @return mixed
     */
    public function auditSalesTable()
    {
        $user = session('user');

        switch($user['nivel']){
            case 1:
                return $this->getModel()
                    ->select('id', 'company_id', 'data_venda','data_filtro', 'nome', 'cpf', 'vendedor', 'supervisor', 'ultimoauditor', 'statusvenda','planolivetim', 'planotimfixo')
                    ->where('statusvenda', '!=', 'AUDITORIA APROVADA')
                    ->where('statusvenda', '!=', '')
                    ->where('company_id', $user['empresa'])
                    ->where('vendedor', $user['nome'])
                    ->where('data_venda','>=', Carbon::now()->subMonth(3))
                    ->paginate(10);
                break;

            case 2:
                return $this->getModel()
                    ->select('id', 'company_id', 'data_venda','data_filtro', 'nome', 'cpf', 'vendedor', 'supervisor', 'ultimoauditor', 'statusvenda','planolivetim', 'planotimfixo')
                    ->where('statusvenda', '!=', 'AUDITORIA APROVADA')
                    ->where('statusvenda', '!=', '')
                    ->where('company_id', $user['empresa'])
                    ->where('data_venda','>=', Carbon::now()->subMonth(3))
                    ->paginate(10);
                break;

            case 3:
                return $this->getModel()
                    ->select('id', 'company_id', 'data_venda','data_filtro', 'nome', 'cpf', 'vendedor', 'supervisor', 'ultimoauditor', 'statusvenda','planolivetim', 'planotimfixo')
                    ->where('statusvenda', '!=', 'AUDITORIA APROVADA')
                    ->where('statusvenda', '!=', '')
                    ->where('vendedor', $user['nome'])
                    ->where('supervisor', $user['nome'])
                    ->where('company_id', $user['empresa'])
                    ->where('data_venda','>=', Carbon::now()->subMonth(3))
                    ->paginate(10);
                break;

            case 7:
                return $this->getModel()
                    ->select('id', 'company_id', 'data_venda','data_filtro', 'nome', 'cpf', 'vendedor', 'supervisor', 'ultimoauditor', 'statusvenda','planolivetim', 'planotimfixo')
                    ->where('statusvenda', '!=', 'AUDITORIA APROVADA')
                    ->where('statusvenda', '!=', '')
                    ->where('company_id', $user['empresa'])
                    ->where('data_venda','>=', Carbon::now()->subMonth(3))
                    ->paginate(10);
                break;

        }
    }

    /**
     * @return mixed
     */
    public function approvedSalesTable()
    {
        $user = session('user');

        switch($user['nivel']){
            case 1:
                return $this->getModel()
                    ->select('id', 'company_id', 'data_venda','data_filtro', 'nome', 'cpf', 'vendedor', 'supervisor', 'ultimoauditor', 'statusvenda','planolivetim', 'planotimfixo','npedido')
                    ->where('statusvenda', '=', 'AUDITORIA APROVADA')
                    ->where('vendedor', $user['nome'])
                    ->where('company_id', $user['empresa'])
                    ->where('data_venda','>=', Carbon::now()->subMonth(3))
                    ->orderBy('id','desc')
                    ->paginate(10);
                break;

            case 2:
                return $this->getModel()
                    ->select('id', 'company_id', 'data_venda','data_filtro', 'nome', 'cpf', 'vendedor', 'supervisor', 'ultimoauditor', 'statusvenda','planolivetim', 'planotimfixo','npedido')
                    ->where('statusvenda', '!=', 'AUDITORIA APROVADA')
                    ->where('data_venda','>=', Carbon::now()->subMonth(3))
                    ->where('company_id', $user['empresa'])
                    ->orderBy('id','desc')
                    ->paginate(10);
                break;

            case 3:
                return $this->getModel()
                    ->select('id', 'company_id', 'data_venda','data_filtro', 'nome', 'cpf', 'vendedor', 'supervisor', 'ultimoauditor', 'statusvenda','planolivetim', 'planotimfixo','npedido')
                    ->where('statusvenda', '=', 'AUDITORIA APROVADA')
                    ->where('vendedor', $user['nome'])
                    ->where('supervisor', $user['nome'])
                    ->where('company_id', $user['empresa'])
                    ->where('data_venda','>=', Carbon::now()->subMonth(3))
                    ->orderBy('id','desc')
                    ->paginate(10);
                break;

            case 7:
                return $this->getModel()
                    ->select('id', 'company_id', 'data_venda','data_filtro', 'nome', 'cpf', 'vendedor', 'supervisor', 'ultimoauditor', 'statusvenda','planolivetim', 'planotimfixo','npedido')
                    ->where('statusvenda', '=', 'AUDITORIA APROVADA')
                    ->where('company_id', $user['empresa'])
                    ->where('data_venda','>=', Carbon::now()->subMonth(3))
                    ->orderBy('id','desc')
                    ->paginate(10);
                break;
        }
    }
}