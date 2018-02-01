<div class="row border-bottom">
    <nav class="navbar navbar-static-top gray-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="#">
                <div class="form-group">
                    <input type="text" placeholder="Pesquise algo..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="{{ route('auth.logout') }}">
                    <i class="fa fa-sign-out"></i> Sair
                </a>
            </li>
        </ul>

    </nav>
</div>