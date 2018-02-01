@extends('layouts.default')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enviar Novo Email:</h5>
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
                              action="#"
                              enctype="multipart/form-data"
                              class="form-horizontal">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Usuário:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="user" readonly value="{{ session('user')['name'] }}"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Modelo de Email:</label>
                                <div class="col-sm-4">
                                    <select name="model" class="form-control" onchange="showFile(this)">
                                        <option value="1">Problema de Score</option>
                                        <option value="2">Irregular Receita Federal.</option>
                                        <option value="3">Data Divergente - Receita Federal.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">CPF/CNPJ:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="cpf" id="cpf" class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nome:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group" id="score-tim" style="display: block">
                                <label class="col-sm-2 control-label">Score Da Tim:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="score_tim" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group" style="display: none" >
                                <label class="col-sm-2 control-label">Score Necessário:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="score_actual" value="0" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nº Ordem Pegasus:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="order_pegasus" id="order_pegasus" class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">PLANO INTERNET:</label>
                                <div class="col-sm-5">
                                    <select name="plan_wan" class="form-control">
                                        <option value="40 MEGA">40 MEGA</option>
                                        <option value="50 MEGA">50 MEGA</option>
                                        <option value="70 MEGA">70 MEGA</option>
                                        <option value="90 MEGA">90 MEGA</option>
                                        <option value="100 MEGA">100 MEGA + TIM FIXO LOCAL</option>
                                        <option value="150 MEGA">150 MEGA + TIM FIXO LOCAL</option>
                                        <option value="50 MEGA EMPRESA">50 MEGA - EMPRESAS</option>
                                        <option value="70 MEGA EMPRESA">70 MEGA - EMPRESAS</option>
                                        <option value="90 MEGA EMPRESA">90 MEGA - EMPRESAS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">PLANO TELEFONE:</label>
                                <div class="col-sm-5">
                                    <select name="plan_phone" class="form-control">
                                        <option value="NENHUM">NENHUM</option>
                                        <option value="TIM FIXO LOCAL PLUS">TIM FIXO LOCAL PLUS</option>
                                        <option value="TIM FIXO LOCAL">TIM FIXO LOCAL</option>
                                        <option value="TIM FIXO BRASIL">TIM FIXO BRASIL</option>
                                        <option value="TIM FIXO BRASIL + TIM">TIM FIXO BRASIL + TIM</option>
                                        <option value="TIM FIXO MUNDO">TIM FIXO MUNDO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">ESTADO:</label>
                                <div class="col-sm-1">
                                    <input type="radio" name="state" value="SP"> São Paulo
                                </div>
                                <div class="col-sm-1">
                                    <input type="radio" name="state" value="RJ"> Rio de Janeiro
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group" style="display: none" id="display-file">
                                <label class="col-sm-2 control-label">Comprovante Receita:</label>
                                <div class="col-sm-4">
                                    <input type="file" multiple name="file" id="file" disabled>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div id="resultado"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        $("#cpf").keydown(function(){
            try {
                $("#cpf").unmask();
            } catch (e) {}
            var length = $("#cpf").val().length;
            if(length < 11){
                $("#cpf").mask("999.999.999-99");
            } else if(length >= 11){
                $("#cpf").mask("99.999.999/9999-99");
            }
            var elem = this;
            setTimeout(function(){
                elem.selectionStart = elem.selectionEnd = 10000;
            }, 0);
            var currentValue = $(this).val();
            $(this).val('');
            $(this).val(currentValue);
        });
    </script>
    <script type="text/javascript">
        function showFile(select) {
            if (select.value == '1') {
                document.getElementById('display-file').style.display = "none";
                document.getElementById('score-tim').style.display = "block";
                $("#file").prop('disabled', true);
            } else {
                document.getElementById('display-file').style.display = "block";
                $("#file").prop('disabled', false);
                $("#file").prop('required', true);
                document.getElementById('score-tim').style.display = "none";
            }
        }
        $(function(){
            $("input[name='order_pegasus']").blur( function(){
                var cpf = $("input[name='cpf']").val();
                var order = $("input[name='order_pegasus']").val();
                $.post('consult_data.php',{cpf: cpf, order: order},function(data){
                    $('#resultado').html(data);
                    console.log(data);
                });
            });
        });// fim do jquery
    </script>
@endsection