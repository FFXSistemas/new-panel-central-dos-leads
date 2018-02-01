@extends('layouts.default')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Fila de de Leads</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
                </li>
                <li>
                    <a>Filas</a>
                </li>
                <li class="active">
                    <a href="{{ route('emails.all') }}"><strong>Leads</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>Fila de Leads:</h5>

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

                    <div class="row">
                        <form class="form-group" action="#" method="post">
                            <label class="col-md-2 control-label">Filtro:</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="method" name="method">
                                    <option value="customer" @if($method == null || $method == 'customer' ) selected @endif>Nome do Cliente</option>
                                    <option value="date" @if( $method == 'date' ) selected @endif>CPF</option>
                                    <option value="id" @if($method == 'id') selected @endif>Pedido Pegasus</option>
                                    <option value="gateway" @if($method == 'gateway') selected @endif>Status do Pedido</option>
                                    <option value="gateway" @if($method == 'gateway') selected @endif>UF</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="value_text" name="value" @if($method == 'status' || $method == 'date' || $method == 'plan' || $method == 'gateway') style="display: none;" @endif >
                                    <select class="form-control" id="value_select"
                                            @if($method == 'status') style="display: block;" @else style="display: none;" @endif >
                                        <option value="0">Nulo</option>
                                        <option value="1">Em espera</option>
                                        <option value="2">Aprovado</option>
                                        <option value="3">Devolvido</option>
                                        <option value="4">Cancelado</option>
                                    </select>

                                    <select class="form-control" id="gateway_select"  @if($method == 'gateway') style="display: block;" @else style="display: none;" @endif>

                                    </select>

                                    <select class="form-control" id="plans_select"  @if($method == 'plan') style="display: block;" @else style="display: none;" @endif>

                                    </select>

                                    <div id="value_date" @if($method == 'date') style="display: block;" @else style="display: none;" @endif >
                                        <label for="" class="col-sm-3 control-label">Escolha:</label>
                                        <div class="col-sm-8">
                                            <div class="clearfix row">
                                                <div class="col-sm-6">
                                                    <input type="text" name="from_date" id="fromDate" placeholder=""
                                                           class="float-left mrg10R form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="to_date" id="toDate" placeholder=""
                                                           class="float-left form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <span class="input-group-btn">
                                <button type="submit" class="btn btn-info" id="filter" title="Pesquisar">
                                    <i class="fa fa-search" ></i>
                                </button>
                            </span>
                                </div>
                                <div id="show-filter" style="display: show">
                                    <input type="checkbox" value="1" id="filter-date" class="custom-checkbox">Filtrar Entre
                                    Datas?
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Data da Solicitação:</th>
                                <th>Tipo de Solicitação:</th>
                                <th>Solicitante:</th>
                                <th>Nome do Cliente:</th>
                                <th>CPF | CNPJ:</th>
                                <th>Pedido do Pegasus:</th>
                                <th>Status do Email:</th>
                                <th>Status da Tratativa:</th>
                                <th>Ações:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emails as $email)
                                <tr>
                                    <td>{{ $email->id }}</td>
                                    <td>{{ \Carbon\Carbon::parse($email->date)->format('d/m/Y H:i:s') }}</td>
                                    <td>{!! emailType($email->model) !!}</td>
                                    <td>{{ $email->user }}</td>
                                    <td>{{ $email->name }}</td>
                                    <td>{{ $email->cpf }}</td>
                                    <td>{{ $email->order_pegasus }}</td>
                                    <td>{{ (empty($email->status))  ? "Aguardando Resposta":"Solicitação Retornada" }}</td>
                                    <td>{{ (empty($email->new_status))  ? "Tratativa Pendente":$email->new_status }}</td>
                                    <td>
                                        <a href="{{ route('emails.edit', ['id' => $email->id]) }}">
                                            <button class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Ver Detalhes</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $emails->render() }}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                "paging": false,
                "filter": false,
                "ordering": false
            });
        });
    </script>
@endsection