@extends('layouts.app')

@section('content')
    <main class="container-fluid">
        <div class="row no-gutters">
            <div class="col-lg-6 offset-lg-3">

                <div class="item">
                    <div class="row no-gutters align-items-end border-bottom py-4">
                        <div class="col-md-4">
                            <a class="" href="#zoom">
                                <img src="{{ config('app.webumenia_url')}}/dielo/nahlad/CZE:PNP.1_2020_F-112/600" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <a href="#prev"><</a>
                            1/4
                            <a href="#next">></a>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-start">
                        <div class="col-md-8 border-right pr-3">
                            <h2 class="font-serif mb-3">Barbora Bieylonovič</h2>
                            <p>
                                Kolekce Barbory Bieylonovič nazvaná „Fáze ženy“ představuje v oblasti ex libris neo- třelý námět. Zaujala i způsobem provedení, kombinujícím techniku leptu s akvatintou nebo suchou jehlou.<br>
                                Podařilo se jí vyjádřit mnohost a různou intenzitu pocitů vystihujících podstatu ženské bytosti. Tato soukromá autorská ex libris mají těsnou návaznost na autorčin volný cyk- lus maleb s názvem „Ticho“, které chápe symbolicky až mysticky, jako dimenzi univerza a subjektivní stav, v němž se odehrávají mnohé emotivní a intuitivní procesy. Zobrazení tváře je jejich vnější vizualizací.<br>
                                Vilma HUbáčková
                            </p>
                        </div>
                        <div class="col-md-4 pl-3 pt-3">
                            <h4 class="text-primary mb-3">
                                grand prix
                            </h4>
                            <p class="font-weight-bold">
                                Barbora Bieylonovič<br>
                                Ex libris BB<br>
                                Fáze ženy III., ze série Ticho Lept, akvatinta – C3 + C5 118 x 80 mm<br>
                                2020
                                inv. číslo:<br>
                            </p>
                            <p class="font-weight-bold">
                                inv. číslo: 1/2020/F - 112
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
$.get('/api/items?collapse=author&size=50', items => {
    $.get('/api/authors?size=' + items.total, authors => {
        const counts = {};

        authors.forEach(author => {
            counts[author.key] = author.doc_count;
        });

        items.data.forEach(item => {
            console.log(item, counts[item.model.author]);
        });
    });
});
    </script>
@endpush
