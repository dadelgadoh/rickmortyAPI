<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $url = 'https://rickandmortyapi.com/api/location';
        $nextpage = true;
        while ($nextpage == true){
            // print_r($url);
            $data = file_get_contents($url);
            $location_json = json_decode($data, true);
            foreach ($location_json['results'] as $loc){
                unset($loc['id']);
                // $loc['created_at'] = $loc['created'];
                unset($loc['created']);
                $location = Location::create($loc);
            };
            if (!filter_var($location_json['info']['next'], FILTER_VALIDATE_URL) === false) {
                $url = $location_json['info']['next'];
                // echo ("Url is valid");
            } else {
                // echo ("Url is not valid");
                $nextpage = false;
            }
        }
    }
}
