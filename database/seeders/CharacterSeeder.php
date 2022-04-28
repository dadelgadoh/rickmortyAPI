<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $url = 'https://rickandmortyapi.com/api/character';
        $nextpage = true;
        while ($nextpage == true){
            // print_r($url);
            $data = file_get_contents($url);
            $character_json = json_decode($data, true);
            foreach ($character_json['results'] as $char){
                unset($char['id']);
                // $char['created_at'] = $char['created'];
                unset($char['created']);
                $character = Character::create($char);
            };
            if (!filter_var($character_json['info']['next'], FILTER_VALIDATE_URL) === false) {
                $url = $character_json['info']['next'];
                // echo ("Url is valid");
            } else {
                // echo ("Url is not valid");
                $nextpage = false;
            }
        }

    }
}
