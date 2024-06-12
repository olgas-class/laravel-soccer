<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class PlayersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Fare la chiamata HTTP al api di giocatori
        $response = Http::withHeaders([
            'X-AUTH-TOKEN' => env('FUTDB_API_KEY')
        ])->get('https://futdb.app/api/players?page=1');

        // Preevo dati dalla risposta
        $data = $response->json(); // array associativo di php

        foreach ($data["items"] as $singlePlayer) {
            $newPlayer = new Player();
            $newPlayer->name = $singlePlayer["name"];
            $newPlayer->gender = $singlePlayer["gender"];
            $newPlayer->birthDate = $singlePlayer["birthDate"];
            $newPlayer->position = $singlePlayer["position"];
            $newPlayer->foot = $singlePlayer["foot"];
            $newPlayer->rating = $singlePlayer["rating"];
            $newPlayer->save();
        }
    }
}
