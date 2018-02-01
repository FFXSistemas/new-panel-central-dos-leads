<li class="active">
    <a href="{{ route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
</li>
<li>
    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Cadastrar Pedidos</span>
        <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('sales.rows.audit') }}"> Tim Live</a></li>
        <li><a href="{{ route('sales.rows.approved') }}">Tim GSM</a></li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-search"></i> <span class="nav-label">Consultas</span>
        <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('sales.rows.audit') }}">Consultar Viabilidade</a></li>
        <li><a href="http://portaltimfiber.com.br:81/tim-website/consulta-de-instalacao" target="_blank">Consultar Pedido</a></li>
        <li><a href="https://www.receita.fazenda.gov.br/Aplicacoes/SSL/ATCTA/CPF/ConsultaSituacao/ConsultaPublica.asp" target="_blank">Consultar CPF - Receita Federal</a></li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-android"></i> <span class="nav-label">Chatbot</span>
        <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('sales.rows.audit') }}">Visualizar Registros</a></li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Tratativa Email</span>
        <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('sales.rows.audit') }}">Enviar Email</a></li>
        <li><a href="{{ route('sales.rows.audit') }}">Visualizar Emails</a></li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Filas</span>
        <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('sales.rows.audit') }}">Fila de Leads</a></li>
        <li><a href="{{ route('sales.rows.approved') }}">Vendas Liberadas</a></li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Usuários</span>
        <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('sales.rows.audit') }}">Gerenciar Usuários</a></li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Configurações</span>
        <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="{{ route('config.index') }}">Configurações Gerais</a></li>
        <li><a href="{{ route('config.blacklist') }}">Blacklist</a></li>
    </ul>
</li>