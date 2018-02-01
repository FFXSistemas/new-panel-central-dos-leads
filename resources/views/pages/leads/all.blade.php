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
                    <a href="{{ route('leads.all') }}"><strong>Leads</strong></a>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                    <th>Empresa:</th>
                                    <th>Nome:</th>
                                    <th>Documento</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Opcional 1</th>
                                    <th>Opcional 2</th>
                                    <th>Status</th>
                                    <th>Criado em:</th>
                                    <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                                    <tr>
                                        <td> {{ $lead->employee_id }}</td>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->document }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->ddd }} - {{ $lead->phone }}</td>
                                        <td>{{ $lead->other_field_1 }}</td>
                                        <td>{{ $lead->other_field_2 }}</td>
                                        <td> {{ $lead->status }}</td>
                                        <td> {{ \Carbon\Carbon::parse($lead->created_at)->format('d/m-Y H:i:s') }}</td>
                                        <td>
                                            <button class="btn btn-success">Editar</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $leads->render() }}
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