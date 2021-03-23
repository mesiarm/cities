<!doctype html>
<html lang="sk">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <title>Cities @yield('title')</title>
</head>
<body>
<div class="container">
    <div class="row mt-3">
        <div class="col-4">
            <img src="{{ asset('images/logo.png') }}" style="width: 20%" alt="logo">
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-4">
                    <a class="text-primary text-decoration-none" href="#">Kontakty a čísla na oddelenia</a>
                </div>
                <div class="col-1">
                    EN<i class="bi bi-caret-down-fill"></i>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <label>
                            <input type="text" class="form-control form-control-sm"/>
                        </label>
                        <span class="input-group-addon">
                            <i class="form-control bi bi-search"></i>
                        </span>
                    </div>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-success">Prihlásenie</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="mx-3">O nás</li>
                <li class="mx-3">Zoznam miest</li>
                <li class="mx-3">Inšpekcia</li>
                <li class="mx-3">Kontakt</li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <footer class="row bg-secondary mt-5">
        <div class="col-3">
            <ul class="list-unstyled mb-5">
                <li class="text-uppercase"><strong>Adresa a kontakt</strong></li>
                <li>ŠUKL</li>
                <li>Kvetná 11</li>
                <li>825 08 Bratislava 26</li>
                <li>Ústredňa:</li>
                <li>+421-2-50701 111</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-uppercase"><strong>Kontakty</strong></li>
                <li>telefónne čísla</li>
                <li>adresa</li>
                <li>úradné hodiny</li>
                <li>bankové spustenie</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-uppercase"><strong>Informácie pre verejnosť</strong></li>
                <li>Zoznam vyvezených liekov</li>
                <li>MZ SR</li>
                <li>Národný portál zdravia</li>
            </ul>
        </div>
        <div class="col-3">
            <ul class="list-unstyled mb-5">
                <li class="text-uppercase"><strong>O nás</strong></li>
                <li>Dotazníky</li>
                <li>Hlavní predstavitelia</li>
                <li>Základné dokumenty</li>
                <li>Zmluvy za ŠUKL</li>
                <li>História a súčastnosť</li>
                <li>Národná spolupráca</li>
                <li>Medzinárodná spolupráca</li>
                <li>Poradné orgány</li>
                <li>Legislatíva</li>
                <li>Priestupky a iné správne delikty</li>
                <li>Zoznam dlžníkov</li>
                <li>Sadzobník ŠUKL</li>
                <li>Verejné obstarávanie</li>
                <li>Vzdelávacie akcie a prezentácie</li>
                <li>Konzultácie</li>
                <li>Voľné pracovné miesta(0)</li>
                <li>Poskytovanie informácii</li>
                <li>Sťažnosti a petície</li>
            </ul>
        </div>
        <div class="col-3">
            <ul class="list-unstyled mb-5">
                <li class="text-capitalize"><strong>Média</strong></li>
                <li>Tlačové správy</li>
                <li>Kontakt pre média</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-capitalize"><strong>Databázy a servis</strong></li>
                <li>Databáza liekov a zdravotníckych pomôcok</li>
                <li>Iné zoznamy</li>
                <li>Kontaktný formulár</li>
                <li>Mapa stránok</li>
                <li>A-Z index</li>
                <li>Linky</li>
                <li>RSS</li>
                <li>Doplnok pre internetový prehliadač</li>
                <li>Prehliadače formátov</li>
            </ul>
        </div>
        <div class="col-3">
            <ul class="list-unstyled mb-5">
                <li class="text-capitalize"><strong>Drogové prekurzory</strong></li>
                <li>Aktuality</li>
                <li>Legislatíva</li>
                <li>Pokyny</li>
                <li>Kontakt</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-capitalize"><strong>Iné</strong></li>
                <li>Linky</li>
                <li>Mapa stránok</li>
                <li>FAQ</li>
                <li>Podmienky používania</li>
            </ul>
            <ul class="list-unstyled mb-5 text-info">
                <li class="text-capitalize"><strong>Rapid Alert system</strong></li>
                <li>Rýchla výstraha vyplývajúca z nedostatkov v kvalite liekov</li>
            </ul>
        </div>
    </footer>
</div>
@yield('scripts')
</body>
</html>
