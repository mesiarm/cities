<?php

namespace App\Http\Controllers;

use App\Models\City;

class CitiesController extends Controller
{
    public function showCity(City $city)
    {
        return view('city_detail', ['city' => $city]);
    }
}
