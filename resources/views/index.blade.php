@extends('layouts.app')

@section('content')
    @include('components.header')

    <main class="container-fluid mb-6">
        <div class="row no-gutters">
            <div class="col-lg-6 offset-lg-3">
                <hr>

                <h2 class="mt-1">ex libris</h2>

                <article class="font-serif">
                    <p>
                        neboli knižní značka se řadí k tradičnímu uměleckému oboru, který prošel zajímavým his-torickým vývojem,
                        než se z něj stala samostatná sběratelská oblast, jak jej vnímáme v dnešní době. Současné ex libris
                        spojované s knižní kulturou i žánrem volné grafiky se přetvořilo ve specifickou výtvarnou disciplínu,
                        které se věnují význační umělci.
                    </p>
                    <p>
                        Celostátní přehlídka Trienále českého ex libris nabízí již po šestnácté možnost zhod-notit vývoj knižní
                        značky, proměny uměleckých tendencí, ikonografické trendy a současné postupy v oblasti grafických technik
                        za poslední tříleté období, tentokrát však netradičně i ve virtuálním prostředí.
                    </p>
                    <p>
                        Výstavní soubor zahrnuje celkem 126 drobných grafik od 46 autorů včetně studentů výtvarných škol.
                        Šestičlenná porota složená z předních odborníků udělila v letošním roce ceny deseti výtvarníkům. Mezi hlavní
                        hodnotící kritéria patřil především důraz na umělec-kou kvalitu, vysokou úroveň výtvarného zpracování,
                        ale také šíři a rozmanitost použitých tra-dičních i moderních grafických technik.
                    </p>
                    <p>
                        Anglicky Ex libris neboli knižní značka se řadí k tradičnímu uměleckému oboru, který prošel zajímavým
                        historickým vývojem, než se z něj stala samostatná sběratelská oblast, jak jej vnímáme v dnešní době.
                        Současné ex libris spojované s knižní kulturou i žánrem volné grafiky se přetvořilo ve specifickou výtvarnou
                        disciplínu, které se věnují význační umělci.
                    </p>
                </article>
            </div>
        </div>

        <div class="preview mt-5 mb-6">
            @foreach ($items as $item)
                <a class="m-1" href="{{ route('catalog') }}#{{ Str::slug($item->author) }}">
                    <img src="{{ config('app.webumenia_url') }}/dielo/nahlad/{{$item->id}}/600" alt="{{ $item->author }}" class="img-fluid mb-3">
                </a>
            @endforeach
            </a>
        </div>

        <div class="row no-gutters">
            <div class="col-lg-6 offset-lg-3">
                <hr>

                <h2 class="mt-1">ocenění</h2>

                <div class="row mt-5 mb-6">
                    <div class="col-md-6">
                        <dl>
                            <dt class="mt-5">Grand Prix</dt>
                            <dd>Barbora Bieylonovič</dd>

                            <dt class="mt-5">Cena za přínos českému ex libris</dt>
                            <dd>Petr Palma</dd>

                            <dt class="mt-5">Cena XVI. Trienále českého ex libris 2020</dt>
                            <dd>Martin Raudenský<br>Jan Melena</dd>

                            <dt class="mt-5">Cena knihovny národního múzea</dt>
                            <dd>Jan Kavan</dd>

                            <dt class="mt-5">Cena spolku sběratelů a přátel exlibris</dt>
                            <dd>Hana Storchová</dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl>
                            <dt class="mt-5">Cena SČUG Hollar</dt>
                            <dd>Petr Alois Hampl</dd>

                            <dt class="mt-5">Cena památníku národního písemnictví</dt>
                            <dd>Martin Mulač</dd>

                            <dt class="mt-5">Ve studentské kategorii</dt>

                            <dt class="mt-4">Cena XVI. Trienále českého ex libris 2020</dt>
                            <dd>Petr Klíma (Vyšší odborná škola grafická v Praze)</dd>

                            <dt class="mt-5">Cena spolku sběratelů a přátel exlibris</dt>
                            <dd>Martina Shořovská (Univerzita J. E. Purkyně v Ústí nad Labem)</dd>
                        </dl>
                    </div>
                </div>

                <hr>

                <article class="mt-6 mb-5 font-serif">
                    <p>
                        Trienále Ex libris pořádané v tomto roce provází několik „zvláštních“ okolností. Jednak
                        se nekoná v místě svého vzniku a zároveň tradičního setkání sběratelů a přátel ex libris.
                        A nemá ani klasickou výstavu spojenou s návštěvníky a také slavnostním předáváním cen,
                        pochopitelně doprovázeným i osobními kontakty umělců, kteří se tvorbou v této disciplíně
                        zabývají. Jako bychom se vrátili zpět do potemnělé intimity knihovny, v níž jsou ochraňovány
                        starobylé svazky s vlepeným majetnickým štítkem ex libris. V podstatě do takové zapovězené
                        tajemné knihovny z románu Umberta Eca Jméno růže. Ale právě tyto vnější a svým způsobem
                        neovlivnitelné okolnosti přivedly tento pravidelný „trojčas“ k novému začátku.
                    </p>
                    <p>
                        Zrodily se dvě varianty a dva přístupy – katalog a online výstava. Tradiční katalog a zároveň
                        nově zvolená virtuální forma prezentace oceněných děl umožní přístup a zhlédnutí daleko širšímu
                        okruhu zájemců o tuto grafickou disciplínu, která v současné době nemá sice takovou
                        provázanost a vztah k samotnému objektu knihy, ale stále tvoří zajímavý segment drobné
                        grafiky a má nejen své autory, ale především sběratele a aktivní příznivce. Za tím se skrývá
                        i řada příběhů, jež jsou spojeny s osobními kontakty umělce a zájemce o jeho grafické dílo.
                        Ostatně i to bylo impulzem k rozhodnutí o vytvoření nové podoby této přehlídky, která by
                        ve svém budoucím pokračování měla mít širší zaměření na tento druh grafiky včetně dalších forem
                        souvisejících s knižní tvorbou. Variantou může být i linie konfrontací zabývajících
                        se osobnostmi, které jsou spojeny s ex libris a které do svých námětů včlenily zajímavé
                        přístupy provázané s dobou. V této souvislosti lze uvést jména jako jsou J. Váchal,
                        F. Kobliha, J. Konůpek, ale pochopitelně i umělce z následujících generací.
                    </p>
                    <p>
                        Když se podíváme na letošní oceněné práce, nalezneme zástupce různých grafických forem
                        od tradičnějších až po ty současné. Tato různorodost se pojí také se samotnými náměty děl, které
                        mají blízko ke knihám v širším smyslu. Právě v této konotaci lze hledat i význam přehlídky
                        a pohledu na EX libris.
                    </p>
                    <p class="mt-4 text-right">Zdeněk Freisleben, ředitel PNP</p>
                </article>

                <hr>

                <h3 class="mt-2">Odborná porota<br>XVI. Trienále českého ex libris 2020</h3>

                <dl class="mt-5 mb-6">
                    <dt class="pt-1 mt-3 border-top">Předseda</dt>
                    <dd>Pavel Piekar</dd>

                    <dt class="pt-1 mt-3 border-top">Členové</dt>
                    <dd>Felix Černoch, Vilma Hubáčková, Martin Mulač, Jana Solomonová, Martina Vyšohlídová</dd>

                    <dt class="pt-1 mt-3 border-top">Tajemnice</dt>
                    <dd>Barbora Vlášková</dd>

                    <dt class="pt-1 mt-3 border-top">Asistentka tajemnice</dt>
                    <dd>Jana Färberová</dd>
                </dl>

                <hr>

                <article class="mt-6 font-serif">
                    <p>
                        Ex libris neboli knižní značka se řadí k tradičnímu umělec-kému oboru, který prošel zajímavým historickým vývojem, než se z něj stala
                        samostatná sběratelská oblast, jak jej vnímáme v dnešní době. Současné ex libris spojované s knižní kulturou
                        i žánrem volné grafiky se přetvořilo ve specifickou výtvarnou disciplínu, které se věnují význační umělci.
                    </p>
                    <p>
                        Celostátní přehlídka Trienále českého ex libris nabízí již po šestnácté možnost zhodnotit vývoj knižní
                        značky, proměny uměleckých tendencí, ikonografické trendy a současné postupy v oblasti grafických technik
                        za poslední tříleté období, tentokrát však netradičně i ve virtuálním prostředí.
                    </p>
                    <p>
                        Výstavní soubor zahrnuje celkem 126 drobných grafik od 46 autorů včetně studen-tů výtvarných škol.
                        Šestičlenná porota složená z předních odborníků udělila v letošním roce ceny deseti výtvarníkům. Mezi hlavní
                        hodnotící kritéria patřil především důraz na uměleckou kvalitu, vysokou úroveň výtvarného zpracování,
                        ale také šíři a rozmanitost použitých tradičních i moderních grafických technik.
                    </p>
                    <p>
                        Anglicky Ex libris neboli knižní značka se řadí k tradičnímu uměleckému oboru, který prošel zajímavým
                        historickým vývojem, než se z něj stala samostatná sběratelská oblast, jak jej vnímáme v dnešní době.
                        Současné ex libris spojované s knižní kulturou i žánrem volné grafiky se přetvořilo ve specifickou výtvarnou
                        disciplínu, které se věnují význační umělci.
                    </p>
                    <p>
                        Celostátní přehlídka Trienále českého ex libris nabízí již po šestnácté možnost zhodnotit vývoj knižní
                        značky, proměny uměleckých tendencí, ikonografické trendy a současné postupy v oblasti grafických technik
                        za poslední tříleté období, tentokrát však netradičně i ve virtuálním prostředí.
                    </p>
                    <p>
                        Výstavní soubor zahrnuje celkem 126 drobných grafik od 46 autorů včetně studentů vý-tvarných škol.
                        Šestičlenná porota složená z předních odborníků udělila v letošním roce ceny deseti výtvarníkům. Mezi hlavní
                        hodnotící kritéria patřil především důraz na umě-leckou kvalitu, vysokou úroveň výtvarného zpracování,
                        ale také šíři a rozmanitost použitých tradičních i moderních grafických technik.
                    </p>
                    <p class="mt-4 text-right">Pavel Piekar, předseda poroty</p>
                </article>
            </div>
        </div>
    </main>

    @include('components.back-to-top')
@endsection
