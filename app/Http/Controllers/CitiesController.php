<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class CitiesController extends Controller
{
    public function showCity(City $city): View
    {
        return view('city_detail', ['city' => $city]);
    }

    public function getCityNames(string $text = null): JsonResponse
    {
        $result = City::query()
            ->where('name', 'LIKE', "%{$text}%")
            ->select('id', 'name')
            ->get();
        return response()->json($result);
    }
}
