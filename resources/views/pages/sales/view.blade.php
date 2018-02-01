@extends('layouts.default')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Visualizar Venda - Nº {{ $sale->ID }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('sales.rows.approved') }}">Vendas</a>
                </li>
                <li>
                    <a>Visualizar Vendas</a>
                </li>
                <li class="active">
                    <a href="{{ route('sales.view',['id' => $sale->ID ]) }}"><strong>Nº {{ $sale->ID }}</strong></a>
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
                    <form method="get" class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-user"></i> <strong>Dados do Solicitante</strong>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">CPF:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->CPF }}" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome Completo:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $sale->NOME }}" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome da mãe:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $sale->NOMEMAE }}" class="form-control">                            </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Data de Nascimento:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->DATANASCIMENTO }}" class="form-control">                            </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">RG:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->RG }}" class="form-control">                            </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Data de Expedição RG:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->DATAEXPEDICAO }}" class="form-control">                            </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sexo :</label>
                                    <div class="col-sm-2">
                                        <select class="form-control">
                                            <option value="MASCULINO" {{ ($sale->SEXO == 'MASCULINO') ? "selected":"" }} >Masculino</option>
                                            <option value="FEMININO" {{ ($sale->SEXO == 'FEMININO') ? "selected":"" }}>Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Telefone Residencial:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->TELEFONERESIDENCIAL }}" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Telefone Celular:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->TELEFONECELULAR }}" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Telefone Comercial:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->TELEFONECOMERCIAL }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-home"></i> <strong>Instalação e Cobrança:</strong>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">CEP:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->CEP }}" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Endereço:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $sale->ENDERECO }}" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nº :</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $sale->NUMEROEND }}" class="form-control">                            </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Complemento:</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{ $sale->COMPLEMENTO }}" class="form-control">                            </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Bairro:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->BAIRRO }}" class="form-control">                            </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cidade:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->CIDADE }}" class="form-control">                            </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">UF :</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $sale->UF }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-shopping-cart"></i> <strong>Planos:</strong>
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Plano:</label>
                                    <div class="input-group col-sm-4">
                                        <select class="form-control">
                                            <optgroup label="TIM LIVE">
                                                <option>35 MEGA</option>
                                                <option>50 MEGA</option>
                                                <option>70 MEGA</option>
                                                <option>90 MEGA</option>
                                                <option>100 MEGA</option>
                                                <option>150 MEGA</option>
                                            </optgroup>
                                        </select>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success"><i class="fa fa-phone-square"></i> ADICIONAR TIM FIXO</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Data de Vencimento:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control">
                                            <option>DIA 07</option>
                                            <option>DIA 10</option>
                                            <option>DIA 12</option>
                                            <option>DIA 15</option>
                                            <option>DIA 20</option>
                                            <option>DIA 25</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">OBSERVAÇÃO :</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">Cadastrar Venda</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection