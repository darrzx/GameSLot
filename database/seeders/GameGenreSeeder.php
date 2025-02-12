<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_genres')->insert([
            'genre' => 'RPG',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'Arcade',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'FPS',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'Sandbox',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'Survival',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'RTS',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'MMORPG',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'Open World',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'Horor',
            'created_at' => now()
        ]);
        DB::table('game_genres')->insert([
            'genre' => 'Battle Royale',
            'created_at' => now()
        ]);
    }
}
