<header class="container-fluid mb-6 navbar-expand-lg navbar-light">
    <div class="row no-gutters">
        <div class="col-sm-8 col-lg-3 order-lg-2">
            <p class="lead mt-3">
                Pro knihy, pro sbírku, pro radost<br>
                XVI. Trienále českého ex libris 2020<br>
                Přehlídka současné tvorby 2018–2020
            </p>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
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
