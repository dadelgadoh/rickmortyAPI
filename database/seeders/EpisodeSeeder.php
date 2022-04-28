<?php

namespace Database\Seeders;

use App\Models\Episode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $url = 'https://rickandmortyapi.com/api/episode';
        $nextpage = true;
        while ($nextpage == true){
            // print_r($url);
            $data = file_get_contents($url);
            $episode_json = json_decode($data, true);
            foreach ($episode_json['results'] as $epi){
                unset($epi['id']);
                // $epi['created_at'] = $epi['created'];
                unset($epi['created']);

                $episode = Episode::create($epi);
            };
            if (!filter_var($episode_json['info']['next'], FILTER_VALIDATE_URL) === false) {
                $url = $episode_json['info']['next'];
                // echo ("Url is valid");
            } else {
                // echo ("Url is not valid");
                $nextpage = false;
            }
        }
        // print_r();
        die;
    }
}
