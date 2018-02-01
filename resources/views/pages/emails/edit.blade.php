@extends('layouts.default')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span class="fa fa-check-square-o"></span><em> {!! session('flash_message') !!}</em></div>
                @endif
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Visualizar Email - ID {{ $email->id }}:</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post"
                              action="{{ route('emails.update', ['id' => $email->id]) }}"
                              class="form-horizontal">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Usuário:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="user" readonly value="{{ $email->user }}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nome:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" readonly value="{{ $email->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">CPF | CNPJ:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="cpf" readonly value="{{ $email->cpf }}" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nº Ordem Pegasus:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="order_pegasus" disabled value="{{ $email->order_pegasus }}" class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">PLANO DE INTERNET:</label>
                                <div class="col-sm-5">
                                    <select name="plan_wan" class="form-control" disabled>
                                        @foreach($plans->where('category', 1) as $plan)
                                            <option value="{{ $plan->name }}"
                                                    {{ ($plan->name == $email->plan_wan) ? "selected":"" }}
                                            >{{ $plan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">PLANO DE TELEFONE:</label>
                                <div class="col-sm-5">
                                    <select name="plan_phone" class="form-control" disabled>
                                        <option value="NENHUM" {{ ($email->plan_phone == 'NENHUM') ? "selected":"" }}>NENHUM</option>
                                        @foreach($plans->where('category', 2) as $plan)
                                            <option value="{{ $plan->name }}"
                                                    {{ ($plan->name == $email->plan_phone) ? "selected":"" }}
                                            >{{ $plan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">ESTADO:</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="state" value="SP" {{ ($email->state == 'SP') ? "checked":"" }}> São Paulo
                                </div>
                                <div class="col-sm-1">
                                    <input type="radio" name="state" value="RJ" {{ ($email->state == 'RJ') ? "checked":"" }}> Rio de Janeiro
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Modelo de Email:</label>
                                <div class="col-sm-4">
                                    <select name="model" class="form-control" onchange="showFile(this)" readonly>
                                        <option value="1">Problema de Score</option>
                                        <option value="2">Irregular Receita Federal.</option>
                                        <option value="3">Data Divergente - Receita Federal.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" style="display: none" id="display-file">
                                <label class="col-sm-2 control-label">Comprovante Receita:</label>
                                <div class="col-sm-4">
                                    <input type="file" multiple name="file" id="file" disabled>
                                </div>
                            </div>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Resposta Via Email:</label>
                                <div class="col-sm-8">
                                    <textarea rows="20" class="form-control">{!! $email->body !!}</textarea>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-4">
                                    <select name="status" class="form-control" disabled>
                                        <option value="EM ANALISE">EM ANALISE</option>
                                        <option value="APROVADO">APROVADO</option>
                                        <option value="REPROVADO">REPROVADO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status Novo Pedido:</label>
                                <div class="col-sm-4">
                                    <select name="new_status" class="form-control" onchange="showDiv(this)">
                                        <option value="NAO INPUTADO">NÂO INPUTADO</option>
                                        <option value="INPUTADO" >INPUTADO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Novo Nº Ordem Pegasus:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="new_order_pegasus" value="{{ $email->new_order_pegasus }}" class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <button class="btn btn-success"><i class="fa fa-save"></i> Salvar Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')




@endsection