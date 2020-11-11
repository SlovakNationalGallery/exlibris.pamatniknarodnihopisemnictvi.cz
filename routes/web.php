<?php

use Elasticsearch\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StyleGuideController;
use App\Models\Item;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('index', function () {
    $items = Item::search()
        ->where('related_work', 'XVI. Trienále českého ex libris 2020')
        ->take(1000)
        ->get()
        ->shuffle()
        ->take(3);

    return view('index', compact('items'));
})->name('index');

Route::get('pro-sbirku', function () {
   return view('catalog');
})->name('catalog');

Route::get('pro-radost', function () {
    $mediumFactory = function ($person, $relation, $source, $title, $subtitle = null) {
        return compact('person', 'relation', 'title', 'subtitle', 'source');
    };

    $media = [
        $mediumFactory(
            'Barbora Bieylonovič',
            'Cena Grand Prix',
            'https://www.youtube.com/embed/qistoCYXk9k',
            'Maya Jane Coles – Run to You',
            '(feat. Claudia Kane)'
        ),
        $mediumFactory(
            'Petr Palma',
            'Cena za přínos českému ex libris',
            'https://www.youtube.com/embed/BqUhZW-46bE',
            'Tři sestry – Expres do Bohnic'
        ),
        $mediumFactory(
            'Martin Raudenský',
            'Cena XVI. Trienále českého ex libris 2020',
            'https://www.youtube.com/embed/XYc0qjAhWoM',
            'FM BELFAST - Underwear'
        ),
        $mediumFactory(
            'Jan Melena',
            'Cena XVI. Trienále českého ex libris 2020',
            'https://www.youtube.com/embed/tRMZ_5WYmCg',
            'David Bowie – Space Oddity'
        ),
        $mediumFactory(
            'Jan Kavan',
            'Cena Knihovny Národního muzea',
            'https://www.youtube.com/embed/We3Qv98zSIc',
            'Jiří Suchý a Semafor Girls – Jó, to jsem ještě žil'
        ),
        $mediumFactory(
            'Hana Storchová',
            'Cena Spolku sběratelů a přátel ex libris',
            'https://www.youtube.com/embed/GRxofEmo3HA',
            'Antonio Vivaldi – Čtvero ročních období'
        ),
        $mediumFactory(
            'Petr Alois Hampl',
            'Cena SČUG Hollar',
            'https://www.youtube.com/embed/WgKVy9BaMuM',
            'Eva Olmerová – Čekej tiše'
        ),
        $mediumFactory(
            'Martin Mulač',
            'Cena Památníku národního písemnictví, porotce',
            'https://www.youtube.com/embed/KRw3cGNOGac',
            'Mortal Cabinet – Crowley'
        ),
        $mediumFactory(
            'Petr Klíma',
            'Cena XVI. Trienále českého ex libris 2020 (studentská kategorie)',
            'https://www.youtube.com/embed/KnzJtm6h9SE',
            'John Frusciante – Murderers'
        ),
        $mediumFactory(
            'Martina Shořovská',
            'Cena Spolku sběratelů a přátel ex libris (studentská kategorie)',
            'https://www.youtube.com/embed/BA4rSO-h9Io',
            'Redbone – Come and Get Your Love'
        ),
        $mediumFactory(
            'Pavel Piekar',
            'předseda poroty',
            'https://www.youtube.com/embed/zq49rymjvNg',
            'Monteverdi – Zefiro Torna'
        ),
        $mediumFactory(
            'Felix Černoch',
            'porotce',
            'https://www.youtube.com/embed/wOJdsMcmpDw',
            'Leoš Janáček - Lašské písně'
        ),
        $mediumFactory(
            'Vilma Hubáčková',
            'vedoucí uměleckých sbírek PNP',
            'https://www.youtube.com/embed/H3fSpllkUtA',
            'Psí vojáci – Žiletky'
        ),
        $mediumFactory(
            'Jana Solomonová',
            'porotkyně',
            'https://www.youtube.com/embed/fyMhvkC3A84',
            'Coldplay – Every teardrop is a waterfall'
        ),
        $mediumFactory(
            'Martina Vyšohlídová',
            'porotkyně',
            'https://www.youtube.com/embed/nkcm5cT9gGI',
            '2Cellos – I will wait'
        ),
        $mediumFactory(
            'Barbora Vlášková',
            'tajemnice',
            'https://www.youtube.com/embed/mE45pn_AMW0',
            'Mirror – Nostalgia',
            '(feat. Dave Gahan)'
        ),
        $mediumFactory(
            'Jana Färberová',
            'asistentka tajemnice',
            'https://www.youtube.com/embed/NGorjBVag0I',
            'Leonard Cohen – Dance Me to the End of Love'
        ),
        $mediumFactory(
            'Zdeněk Freisleben',
            'ředitel PNP',
            'https://www.youtube.com/embed/2AMMb9CiScI',
            'Leonard Cohen – Happens to the Heart'
        ),
        $mediumFactory(
            'Helena Šantavá',
            'grafika',
            'https://www.youtube.com/embed/f1CNNf9iU9Y',
            'Arvö Part – Salve Regina'
        ),
        $mediumFactory(
            'Jaromír Štoural',
            'knihtisk',
            'https://www.youtube.com/embed/KUmZp8pR1uc',
            'Amy Winehouse – Rehab'
        ),
        $mediumFactory(
            'Kateřina Kostková',
            'produkce',
            'https://www.youtube.com/embed/pPdOo2E5zOc',
            'The Limiñanas – Calentita',
            '(feat. Nuria)'
        ),
        $mediumFactory(
            'Aneta Křižková',
            'propagace',
            'https://www.youtube.com/embed/5soixb2U6xM',
            'Cigarettes After Sex – Affection'
        ),
        $mediumFactory(
            'Alžběta Ambrožová',
            'překlad do angličtiny',
            'https://www.youtube.com/embed/ak0yZ1vgy6o',
            'Noname – Don\'t Forget About Me',
        ),
        $mediumFactory(
            'Mariana Dočekalová',
            'doprovodný program',
            'https://www.youtube.com/embed/O52jAYa4Pm8',
            'Taking Head – Psycho Killer'
        ),
        $mediumFactory(
            'Michal Čudrnák, Rastislav Chynoranský, Igor Rjabinin',
            'web virtuální výstavy',
            'https://www.youtube.com/embed/WezWspsKgpM',
            'Floating Points – Anasickmodular'
        ),
    ];

    return view('info', compact('media'));
})->name('info');

Route::get('zoom/{author}/{page}', function ($author, $page) {
    return view('zoom', compact('author', 'page'));
})->where(['page' => '\d+'])->name('zoom');

Route::get('styleguide', [StyleGuideController::class, 'index'])->name('styleguide');
