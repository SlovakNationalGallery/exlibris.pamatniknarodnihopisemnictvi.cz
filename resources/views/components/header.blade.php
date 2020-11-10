<header class="container-fluid mb-3 mb-md-6 navbar-expand-lg navbar-light">
    <div class="row no-gutters">
        <div class="col-sm-8 col-lg-3 order-lg-2">
            <button class="navbar-toggler text-dark mt-3 p-0 border-0" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars fa-2x"></i>
            </button>
            <p class="lead mt-3">
                <span class="d-none d-sm-inline">Pro knihy, pro sbírku, pro radost<br></span>
                XVI. Trienále českého ex libris 2020<br>
                Přehlídka současné tvorby 2018–2020
            </p>
        </div>

        <div class="col-lg-9 order-lg-1">
            <nav class="collapse navbar-collapse">
                <ul>
                    <li class="{{ Route::is('index') ? 'active' : '' }}"><a href="{{ route('index') }}">Pro knihy</a></li>
                    <li class="{{ Route::is('catalog') ? 'active' : '' }}"><a href="{{ route('catalog') }}">pro sbírku</a></li>
                    <li class="{{ Route::is('info') ? 'active' : '' }}"><a href="{{ route('info') }}">pro radost</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
