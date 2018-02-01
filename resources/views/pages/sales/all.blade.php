@extends('layouts.default')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Fila de Auditoria</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
                </li>
                <li>
                    <a>Filas</a>
                </li>
                <li class="active">
                   <a href="{{ route('sales.rows.audit') }}"><strong>Auditoria</strong></a>
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
                    <h5>Vendas em Auditoria:</h5>

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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Auditor</th>
                                <th></th>
                                <th>Nome do Cliente</th>
                                <th>Vendedor</th>
                                <th>Supervisor</th>
                                <th>Plano Internet/Telefone</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($sale->data_filtro)->format("d/m/Y H:i:s") }}</td>
                                    <td>{{ $sale->ultimoauditor }}</td>
                                    <td>
                                        {!!  ($sale->reInputSale->count() >= 2) ?
                                         '<button class="btn btn-xs btn-danger"><b>Re-input</b></button>'
                                         :
                                         '<button class="btn btn-xs btn-success"><b>Novo Input</b></button>' !!}
                                    </td>
                                    <td>{{ $sale->nome }}</td>
                                    <td>{{ $sale->vendedor }}</td>
                                    <td>{{ $sale->supervisor }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-success"><i class="fa fa-wifi"></i>
                                            <b>INTERNET:</b> {{ $sale->planolivetim }} </button>
                                        <button class="btn btn-xs btn-success"><i class="fa fa-phone-square"></i> <b>TELEFONE:</b> {{ ($sale->planotimfixo) ? $sale->planotimfixo:"NENHUM" }}
                                        </button>
                                    </td>
                                    <td>{{ $sale->statusvenda }}</td>
                                    <td>
                                        <a href="{{ route('sales.view',['id' => $sale->id ]) }}">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Visualizar</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $sales->render() }}
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
                "filter": false
            });
        });
    </script>
@endsection