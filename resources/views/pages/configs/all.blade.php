@extends('layouts.default')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Configurações</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
                </li>
                <li>
                    <a>Configurações</a>
                </li>
                <li class="active">
                  <a href="{{ route('config.index') }}">
                      <strong>Configurações Gerais</strong>
                  </a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" action="{{ route('config.update') }}" class="form-horizontal">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-building"></i> <strong>Dados da Empresa</strong>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Razão Social:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $config->company }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome Fantasia:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $config->fantasy_name }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">CNPJ:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $config->cnpj }}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-user"></i> <strong>Responsável Técnico:</strong>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $config->responsible }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email de Contato:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $config->email }}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-usd"></i> <strong>Informações de Fatura:</strong>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Data de Vencimento:</label>
                                    <div class="col-sm-3">
                                        <input type="text" value="Dia {{ $config->maturity }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor da Mensalidade:</label>
                                    <div class="col-sm-3">
                                            <input type="text" value="R$ {{ $config->monthly_payment }}" disabled class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-cogs"></i> <strong>Configurações:</strong>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ativar Consulta de Dados nas Vendas?</label>
                                    <div class="input-group col-sm-4">
                                        <select class="form-control" name="data_consult">
                                                <option value="1" {{ ($config->data_consult == 1) ? "selected":"" }}>Sim</option>
                                                <option value="0"  {{ ($config->data_consult == 0) ? "selected":"" }}>Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-danger" type="submit"><i class="fa fa-save"></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection