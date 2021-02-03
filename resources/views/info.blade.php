@extends('layouts.app')

@section('content')
    @include('components.header')

    <main class="container-fluid mb-6">
        <div class="row no-gutters">
            <div class="col-lg-6 offset-lg-3">
                <hr>

                <h3 class="mt-2">Tvorba</h3>

                <p class="font-serif">
                    Jak vzniká ex libris?
                    Karantéňan vás společně s kurátorkou ex libris Barborou Vláškovou a výtvarníky Barborou Bieylonovič
                    a Martinem Mulačem provede tvorbou EX LIBRIS krok za krokem. Zkuste si knižní značku vyrobit doma
                    a zapojte se s Karantéňanem do výzvy #objevexlibris #vyryjznacku!
                </p>

                <p>Více informací o projektu Karantéňan najdete zde.</p>

                <div class="col-md-6 embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/XoxO-ViQeig">
                    </iframe>
                </div>

                <hr class="mt-6">

                <h3 class="mt-2">Playlist</h3>

                <p class="font-serif">
                    Poslechněte si, u jakých skladeb tvoří účastníci<br>
                    XVI. Trienále českého ex libris 2020
                </p>

                <div class="mt-5 mb-6">
                    @foreach($media as $medium)
                        <p class="lead mb-1">
                            <span class="font-weight-bold">{{ $loop->iteration }}. {{ $medium['person'] }}</span>,
                            {{ $medium['relation'] }}:<br>
                            <span class="font-weight-bold">{{ $medium['title'] }}</span>
                            {{ $medium['subtitle'] }}
                        </p>

                        <div class="container-fluid mb-5">
                            <div class="row">
                                <div class="col-md-6 embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                            src="{{ $medium['source'] }}">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <p>Kompletní playlist si můžete <a href="https://www.youtube.com/playlist?list=PLx_Nm9wbWQapGk6_AlrAFWz2QwqLBZihd" target="_blank">poslechnout zde</a>.</p>
                </div>

                <hr>

                <h3 class="mt-2">Koncept</h3>

                <div class="row">
                    <div class="col-md-8">
                        <p class="font-serif">
                            Grafické řešení letošního trienále je podpořeno starou tiskovou technikou ve spolupráci
                            s tiskařem Jaromírem Štouralem z knihtiskové dílny Vysoké školy uměleckoprůmyslové v Praze.
                        </p>
                    </div>
                </div>

                <article class="mt-3 mb-6 lead">
                    <p>
                        „Knihtisk jako archaická tisková technika dnes spadá do umělecké grafiky obdobně jako linoryt,
                        suchá jehla či lept – grafické techniky, které používají autoři ex libris.  Díky této ruční výrobě
                        obálky katalogu, diplomů, pozvánek či desek s pamětními listy můžeme používat různé barvy grafických
                        kartonů. Trienále ex libris obesílají převážně umělci, kteří se věnují grafické tvorbě, a studenti
                        výtvarných škol. Ačkoliv tvorba ex libris je disciplína mizející, trienále vytváří prostor, kde
                        se může uplatnit i grafická tvorba menších rozměrů, a tak trvale podporuje vznik grafických děl.
                        Soutěžní výběr pak ukazuje mnohost přístupů a různé druhy výtvarného projevu v současné grafické
                        tvorbě.“
                    </p>
                    <p class="mt-4 text-right">Helena Šantavá, grafička XVI. Trienále českého ex libris 2020</p>
                </article>

                <img class="img-fluid my-3" src="{{ asset('img/pro_radost_1.jpg') }}">
                <img class="img-fluid my-3" src="{{ asset('img/pro_radost_2.jpg') }}">
                <img class="img-fluid my-3" src="{{ asset('img/pro_radost_3.jpg') }}">
                <img class="img-fluid my-3" src="{{ asset('img/pro_radost_4.jpg') }}">
            </div>
        </div>
    </main>

    @include('components.back-to-top')
@endsection
