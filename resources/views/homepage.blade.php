@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="row">
        <div class="col-4">
            <img src="{{ asset('images/logo.png') }}" style="width: 20%" alt="logo">
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-9">
                    <a class="text-primary text-decoration-none" href="#">Kontakty a čísla na oddelenia</a>
                    EN<i class="bi bi-caret-down-fill"></i>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm"/>
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
    <div class="p-5 bg-primary">
        <h2 class="text-center text-white">Vyhľadať v databáze obcí</h2>
        <div class="col-2 mx-auto">
            <label>
                <input class="form-control" placeholder="Zadajte názov">
            </label>
        </div>
    </div>
    <div class="row bg-secondary">
        <div class="col-3">
            <ul class="list-unstyled mb-5">
                <li class="text-uppercase">Adresa a kontakt</li>
                <li>ŠUKL</li>
                <li>Kvetná 11</li>
                <li>825 08 Bratislava 26</li>
                <li>Ústredňa:</li>
                <li>+421-2-50701 111</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-uppercase">Kontakty</li>
                <li>telefónne čísla</li>
                <li>adresa</li>
                <li>úradné hodiny</li>
                <li>bankové spustenie</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-uppercase">Informácie pre verejnosť</li>
                <li>Zoznam vyvezených liekov</li>
                <li>MZ SR</li>
                <li>Národný portál zdravia</li>
            </ul>
        </div>
        <div class="col-3">
            <ul class="list-unstyled mb-5">
                <li class="text-uppercase">O nás</li>
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
                <li class="text-capitalize"> Média</li>
                <li>Tlačové správy</li>
                <li>Kontakt pre média</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-capitalize">Databázy a servis</li>
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
                <li class="text-capitalize">Drogové prekurzory</li>
                <li>Aktuality</li>
                <li>Legislatíva</li>
                <li>Pokyny</li>
                <li>Kontakt</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-capitalize">Iné</li>
                <li>Linky</li>
                <li>Mapa stránok</li>
                <li>FAQ</li>
                <li>Podmienky používania</li>
            </ul>
            <ul class="list-unstyled mb-5">
                <li class="text-capitalize">Rapid Alert system</li>
                <li>Rýchla výstraha vyplývajúca z nedostatkov v kvalite liekov</li>
            </ul>
        </div>
    </div>
@endsection
