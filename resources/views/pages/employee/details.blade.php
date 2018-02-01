@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="row col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img widget-head-color-box navy-bg p-lg text-center">
                        <!-- Current avatar -->
                        <div class="avatar-view" title="Change the avatar">
                            <img src="http://i.imgur.com/WMAR0i1.jpg" height="140" width="140"
                                 class="img-circle circle-border m-b-md" alt="SEM FOTO">
                        </div>
                    </div>

                    <div class="widget-text-box text-left">
                        <h3 class="media-heading text-center">{{ $employee->name }}</h3>

                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-map-marker user-profile-icon"></i> Rua Teofrasto , 223 , Vila
                                Formosa,
                                SP.
                            </li>

                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Programador PHP
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i> Funcionário Ativo: Sim
                            </li>
                        </ul>

                        <div class="text-center" id="other_buttons">
                            <p>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-edit m-right-xs"></i> Editar Dados</a>
                            </p>
                            <p>
                                <a class="btn btn-xs btn-danger" target="_blank" href="imprimir_ficha.php?id="><i
                                            class="fa fa-print m-right-xs"></i> Imprimir Ficha para Assinar</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab"
                                                                data-toggle="tab"
                                                                aria-expanded="true">Documentações</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                                                data-toggle="tab"
                                                                aria-expanded="false">Ocorrências</a>
                            </li>
                            <li role="presentation" class="active"><a href="#tab_content3" role="tab"
                                                                      id="profile-tab2" data-toggle="tab"
                                                                      aria-expanded="false">Dados do Funcionário</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="home-tab">

                                <!-- start user projects -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>DOCUMENTO ENVIADO</th>
                                        <th>OPÇÕES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Carteira de Trabalho</td>
                                        <td><a class="btn btn-danger btn-sm" target="_blank" href="'.$LINK.'"><i
                                                        class="fa fa-search m-right-xs"></i> Visualizar Documentação</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                                <center><a class="btn btn-danger btn-sm" href="adicionar-documentacao.php?id="><i
                                                class="fa fa-check-square-o m-right-xs"></i> Adicionar Documentação</a>
                                </center>
                                <!-- end user projects -->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                 aria-labelledby="profile-tab">

                                <!-- start user projects -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>TIPO DE OCORRÊNCIA:</th>
                                        <th>SOLICITANTE DA OCORRÊNCIA:</th>
                                        <th>DATA OCORRÊNCIA:</th>
                                        <th>OPÇÔES:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Advertência</td>
                                        <td>Daniel Rubin</td>
                                        <td>06/11/2017 23:47</td>
                                        <td><a class="btn btn-danger btn-sm" target="_blank" href=""><i
                                                        class="fa fa-search m-right-xs"></i> Visualizar
                                                Ocorrência</a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <!-- end user projects -->
                                <br>
                                <center><a class="btn btn-danger btn-sm"
                                           href="adicionar-ocorrencia.php?id= echo $linha['ID']?>"><i
                                                class="fa fa-check-square-o m-right-xs"></i> Adicionar
                                        Ocorrência</a></center>
                            </div>
                            <!---Fist Div--->
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content3"
                                 aria-labelledby="profile-tab">
                                <div class="border-bottom white-bg dashboard-header">
                                    <h1>Dados do Funcionário:</h1>
                                    <table width='837' border='0' cellspacing='0' cellpadding='0' valign="left">
                                        <tr>
                                            <td width='836'>
                                                <table width='836' border='0' align="left">
                                                    <tr align="left">
                                                        <td width='162'><b>Nome Completo:</b></td>
                                                        <td width='764'>{{ $employee->name }}</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Data de Nascimento:</b></td>
                                                        <td>{{ \Carbon\Carbon::parse($employee->date_birth)->format('d/m/Y')}}</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><b>Sexo:</b></td>
                                                        <td> Masculino</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Grau De Escolaridade:</b></td>
                                                        <td> Ensino Médio Completo</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><b>Telefone Residencial:</b></td>
                                                        <td> (11) 4175-0185&nbsp;&nbsp;&nbsp;
                                                            <b>Telefone Celular:</b>&nbsp;&nbsp;(11) 95962-6779
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Telefone de Recado:</b></td>
                                                        <td>(11) 1242-1234</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><b>Estado Civil:</b></td>
                                                        <td> Casado&nbsp; &nbsp; &nbsp;
                                                            &nbsp; <b>Filhos:</b> 1
                                                        </td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><b>Endereço:</b></td>
                                                        <td> Rua Teofrasto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <b>Nº:</b> 233&nbsp;&nbsp;&nbsp;<b>Complemento:</b>
                                                            Casa 02
                                                        </td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><strong>Bairro/Municipio:</strong></td>
                                                        <td> Vila Formosa
                                                            <b>UF:</b> SP&nbsp;&nbsp;<b>CEP:</b>&nbsp;
                                                            03379-050
                                                        </td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><b>CPF:</b></td>
                                                        <td> {{ $employee->document_cpf }}
                                                            &nbsp;&nbsp;<b>RG:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            36.060.264-2 / SSP
                                                        </td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><b>Nome da Mãe:</b></td>
                                                        <td> {{ $employee->mothers_name }}</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><b>Nome do Pai:</b></td>
                                                        <td> {{ $employee->father_name }}</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td height='21'><b>Email:</b></td>
                                                        <td> santiago@proinput.com.br</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="border-bottom white-bg dashboard-header">
                                    <h1>Dados Admissionais(Uso da Empresa):</h1>
                                    <table width='837' border='0' cellspacing='0' cellpadding='0' valign="left">
                                        <tr>
                                            <td width='836'>
                                                <table width='836' border='0' align="left">
                                                    <tr align="left">
                                                        <td><b>Admissão:</b></td>
                                                        <td> 14/05/2016</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Empresa:</b></td>
                                                        <td>PROINPUT SISTEMAS</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Salário:</b></td>
                                                        <td>R$ 3500,00</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Vinculo Trabalhista:</b></td>
                                                        <td>Dono/Sócio</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Hórario de Expediente:</b></td>
                                                        <td>Seg a Sex: 09 as 18:00</td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Departamento:</b></td>
                                                        <td> Diretoria
                                                            <b>Cargo:</b> CEO
                                                        </td>
                                                    <tr align="left">
                                                        <td>
                                                            <b>Banco:</b> Itau
                                                        </td>
                                                        <td><b>Agência:</b> 6469&nbsp;&nbsp;
                                                            <b>Conta:</b>&nbsp;19660-1&nbsp;
                                                            <b>Tipo de Conta:</b> &nbsp;Conta Corrente (Júridica)
                                                        </td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Vale Transporte:</b> Sim</td>
                                                        <td><b>Valor:</b> R$ 13 &nbsp;<b>Plano
                                                                de Saúde:</b> Sim &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr align="left">
                                                        <td><b>Vale Refeição:</b> Sim</td>
                                                        <td><b>Valor:</b>&nbsp;&nbsp;&nbsp;13 <b>Auxilio
                                                                Creche:</b> &nbsp;&nbsp;&nbsp;&nbsp;Sim <b>Comissão:</b>
                                                            Não
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection