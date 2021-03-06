<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\DomCrawler\Crawler;

class DataImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data about cities in Nitra region';

    private $saveData;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->saveData = [];
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Removing old records...');
        City::query()->truncate();
        Storage::deleteDirectory('public/images');

        $mainPageUrl = 'https://www.e-obce.sk/kraj/NR.html';
        $this->info("Parsing main page $mainPageUrl ...");
        $mainPageCrawler = new Crawler(file_get_contents($mainPageUrl));

        $districtLinkElements = $mainPageCrawler
            ->filter('#okres>table>tr>td')
            ->eq(1)
            ->filter('a');

        $bar = $this->output->createProgressBar($districtLinkElements->count());
        $bar->start();
        $this->output->newLine();

        foreach ($districtLinkElements as $districtLinkElement) {
            $districtPageUrl = $districtLinkElement->getAttribute('href');
            $this->parseDistrictPage($districtPageUrl, $bar);
        }

        $bar->finish();
        $this->info('Parsing pages finished successfully.');

        $this->info('Saving records...');
        collect($this->saveData)
            ->chunk(500)
            ->each(fn(Collection $chunk) => City::query()->insert($chunk->toArray()));
        $this->info('Records saved successfully.');

        return 0;
    }

    private function parseDistrictPage(string $districtPageUrl, ProgressBar $bar)
    {
        $this->info("Parsing district page $districtPageUrl ...");

        $districtPageDom = new Crawler(file_get_contents($districtPageUrl));

        $citiesLinks = $districtPageDom
            ->filter('#telo>table')->first()
            ->children('tr>td')->eq(1)
            ->children('table>tr>td')->eq(2)
            ->children('table')->eq(1)
            ->children('tr>td>a');

        foreach ($citiesLinks as $cityLink) {
            $cityLinkHref = $cityLink->getAttribute('href');
            if ($cityLinkHref === '#') {
                continue;
            }
            $this->info("Parsing city page $cityLinkHref ...");
            $cityPage = new Crawler(file_get_contents($cityLink->getAttribute('href')));
            $cityPageInfoTables = $cityPage
                ->filter('#telo>table')->first()
                ->children('tr>td')->eq(1)
                ->children('table>tr>td')->eq(2)
                ->children('table');

            [
                'cityName' => $cityName,
                'phone' => $phone,
                'fax' => $fax,
                'email' => $email,
                'web' => $web,
                'address' => $address,
                'mayorName' => $mayorName,
                'coatOfArmsFilename' => $coatOfArmsFilename,
            ] = $this->parseCityInfo($cityPageInfoTables);

            $city = new City([
                'name' => $cityName,
                'mayor_name' => $mayorName,
                'city_hall_address' => $address,
                'phone' => $phone,
                'fax' => $fax,
                'email' => $email,
                'web' => $web,
                'coat_of_arms' => $coatOfArmsFilename,
            ]);
            $this->saveData[] = $city;
        }
        $bar->advance();
        $this->output->newLine();
    }

    private function parseCityInfo($cityPageInfoTables): array
    {
        $firstInfoTable = $cityPageInfoTables->eq('0');

        $cityNameText = $firstInfoTable
            ->children('tr')->first()
            ->children('td')->first()->text();

        $cityNameMatches = array();
        preg_match('/^(?:Obec|Mesto)\s([^(]+)(?:(?:\s\(.+\))?)$/', $cityNameText, $cityNameMatches);

        $cityName = $cityNameMatches[1];

        $phone = $firstInfoTable
            ->children('tr')->eq(2)
            ->children('td')->eq(3)->text();

        $fax = $firstInfoTable
            ->children('tr')->eq(3)
            ->children('td')->eq(2)->text();

        $email = $firstInfoTable
            ->children('tr')->eq(4)
            ->children('td')->eq(2)->text();

        $web = $firstInfoTable
            ->children('tr')->eq(5)
            ->children('td')->eq(2)->text();

        $firstAddressLine = $firstInfoTable
            ->children('tr')->eq(4)
            ->children('td')->first()->text();

        $secondAddressLine = $firstInfoTable
            ->children('tr')->eq(5)
            ->children('td')->first()->text();
        $address = "{$firstAddressLine} {$secondAddressLine}";

        $coatOfArmsImage = $firstInfoTable
            ->children('tr')->eq(2)
            ->children('td>img')->first();

        $coatOfArmsUrl = $coatOfArmsImage->getNode(0)->getAttribute('src');
        $coatOfArmsFilename = $this->downloadCoatOfArms($coatOfArmsUrl);

        $secondInfoTable = $cityPageInfoTables->eq(1);

        $mayorName = $secondInfoTable
            ->children('tr')->eq(7)
            ->children('td')->eq(1)->text();

        return compact(
            'cityName',
            'phone',
            'fax',
            'email',
            'web',
            'address',
            'mayorName',
            'coatOfArmsFilename',
        );
    }

    private function downloadCoatOfArms($coatOfArmsUrl)
    {
        $contents = file_get_contents($coatOfArmsUrl);
        $name = Str::afterLast($coatOfArmsUrl, '/');
        Storage::put("public/images/$name", $contents);
        return $name;
    }
}
