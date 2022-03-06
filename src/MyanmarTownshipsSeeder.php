<?php

namespace HtetMyatHlaing\MyanmarTownships;

use Illuminate\Database\Seeder;
use HtetMyatHlaing\MyanmarTownships\Models\State;
use HtetMyatHlaing\MyanmarTownships\Models\District;
use HtetMyatHlaing\MyanmarTownships\Models\Township;

class MyanmarTownshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = config('townships');
        foreach ($states as $st) {
            $state =  State::create([
                "name_en" => trim($st['name_en']),
                "name_mm" => trim($st['name_mm']),
                "sr_code" => trim($st['sr_code']),
                "sr_id" => trim($st['sr_id']),
                "lat" => trim($st['lat']),
                "lng" => trim($st['lng']),
            ]);
            foreach ($st['districts'] as $dist) {
                $district = District::create([
                    "name_en" => trim($dist['name_en']),
                    "name_mm" => trim($dist['name_mm']),
                    "lat" => trim($dist['lat']),
                    "lng" => trim($dist['lng']),
                    "dist_id" => trim($dist['dist_id']),
                    'state_id' => $state->id
                ]);
                foreach ($dist['townships'] as $tsp) {
                    Township::create([
                        "name_en" => trim($tsp['name_en']),
                        "name_mm" => trim($tsp['name_mm']),
                        "tsp_code_en" =>  $tsp['tsp_code_en'],
                        "tsp_code_mm" =>  $tsp['tsp_code_mm'],
                        "tsp_id" => trim($tsp['tsp_id']),
                        "postal_code" =>  $tsp['postal_code'],
                        "lat" =>  $tsp['lat'],
                        "lng" => trim($tsp['lng']),
                        'district_id' => $district->id
                    ]);
                }
            }
        }
    }
}
