<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DataGeocodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch geocode data for cities';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cities = City::all();

        $updateData = [];

        $this->info('Fetching geocode data...');

        $bar = $this->output->createProgressBar(count($cities));
        $bar->start();

        foreach ($cities as $city) {
            [
                'street' => $street,
                'cityName' => $cityName,
                'postalCode' => $postalCode
            ] = $this->parseAddress($city->city_hall_address);

            $response = Http::get('https://nominatim.openstreetmap.org/search', [
                'street' => $street,
                'city' => $cityName,
                'postalCode' => $postalCode,
                'format' => 'json',
            ])->json();

            if (isset($response[0])) {
                $updateData[] = array_merge($city->toArray(), [
                    'latitude' => $response[0]['lat'],
                    'longitude' => $response[0]['lon'],
                ]);
            }

            //due to nominatim usage policy (https://operations.osmfoundation.org/policies/nominatim/)
            sleep(1);
            $bar->advance();
        }

        $bar->finish();
        $this->output->newLine();
        $this->info('Fetching geocode data finished successfully.');

        $this->info('Saving data..');
        City::query()->upsert($updateData, 'id', ['latitude', 'longitude']);
        $this->info('Saving data finished successfully.');

        return 0;
    }

    private function parseAddress(string $cityHallAddress)
    {
        preg_match('/^(.*)(\d{2}\s?\d\s?\d{2})(.*)$/', $cityHallAddress, $matches);
        $street = isset($matches[1]) ? $matches[1] : '';
        $postalCode = isset($matches[2]) ? $matches[2] : '';
        $cityName = isset($matches[3]) ? $matches[3] : '';

        return compact('street', 'cityName', 'postalCode');
    }
}
