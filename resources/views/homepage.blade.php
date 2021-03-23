@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="p-5 bg-primary">
        <h2 class="text-center text-white">Vyhľadať v databáze obcí</h2>
        <div class="col-2 mx-auto">
            <label>
                <input class="form-control" placeholder="Zadajte názov" id="city-selector">
            </label>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const cityNamesPath = '{{route('cityNames', ['text' => ':text'])}}';
        const showCityPath = '{{route('showCity', ['city' => ':city'])}}';
    </script>
    <script src="{{ mix('js/city.autocomplete.js') }}"></script>
@endsection
