@extends('layouts.app')

@section('title', 'City detail')

@section('content')
    <h2 class="text-center">Detail obce</h2>
    <div class="p-5 row">
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    <ul class="list-unstyled mb-5 bg-secondary">
                        <li><strong>Meno starostu</strong></li>
                        <li><strong>Adresa obecného úradu</strong></li>
                        <li><strong>Telefón</strong></li>
                        <li><strong>Fax</strong></li>
                        <li><strong>Email:</strong></li>
                        <li><strong>Web:</strong></li>
                        <li><strong>Zemepisné súradnice</strong></li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-unstyled mb-5">
                        <li>{{$city->mayor_name}}</li>
                        <li>{{$city->city_hall_address}}</li>
                        <li>{{$city->phone}}</li>
                        <li>{{$city->fax}}</li>
                        <li>{{$city->email}}</li>
                        <li>{{$city->web}}</li>
                        <li>{{$city->latitude}}, {{$city->longitude}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-6 mx-auto">
            <img class="mx-auto d-block" src="{{asset("storage/images/{$city->coat_of_arms}")}}" alt="coat of arms">
            <h3 class="text-center text-primary mt-2">{{$city->name}}</h3>
        </div>
    </div>
@endsection
