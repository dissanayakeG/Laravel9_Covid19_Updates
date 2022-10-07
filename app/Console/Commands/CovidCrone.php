<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CovidCrone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'covid:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Executed Successfully!';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron execution!");

        $client = new \GuzzleHttp\Client();
        $url = 'https://www.hpb.health.gov.lk/api/get-current-statistical';

        $result = $client->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
        $covidData = json_decode($result->getBody()->getContents(), true);

        $published_at = \Carbon\Carbon::now();
        DB::table('covid_details')->insert(
            [
                'update_date_time' => $covidData['data']['update_date_time'],
                'local_new_cases' => $covidData['data']['local_new_cases'],
                'local_total_cases' => $covidData['data']['local_total_cases'],
                'local_total_number_of_individuals_in_hospitals' => $covidData['data']['local_total_number_of_individuals_in_hospitals'],
                'local_deaths' => $covidData['data']['local_deaths'],
                'local_recovered' => $covidData['data']['local_recovered'],
                'created_at' => $published_at
            ]);
    }
}
