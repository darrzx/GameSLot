<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('games')->insert([
            'gametitle' => 'Counter Strike : Global Offensive',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'CSGO.jpeg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'Apex Legends',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'apex.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'Cyberpunk',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'cyberpunk.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'Dota 2',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'dota2.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'Fifa 2023',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'fifa23.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'GTA V',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'GTAV.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'NBA 2023',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'nba23.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'Overwatch 2',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'overwatch2.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'PUBG',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'pubg.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
        DB::table('games')->insert([
            'gametitle' => 'Valorant',
            'gamegenre_id' => $faker->randomElement(DB::table('game_genres')->where('id', '>', 0)->pluck('id')),
            'gameimage' => 'valorant.jpg',
            'gameprice' => $faker->numberBetween(0, 50),
            'gamedescription' => $faker->paragraph(7),
            'gamepegirating' => $faker->randomElement([0, 3, 7, 12, 16, 18]),
            'Created_at' => now()
        ]);
    }
}
