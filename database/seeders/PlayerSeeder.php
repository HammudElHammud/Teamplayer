<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use General;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    const PLAYERS_COUNT = 7;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usedRatings = [];
        $ratings = General::generateUniqueIntArray(self::PLAYERS_COUNT, 1, 10);
        // for first team
        $team1 = Team::query()->create();
        $team2 = Team::query()->create();
        for ($i = 1; $i <= self::PLAYERS_COUNT; $i++) {
            $playerRating = General::generateUniqueRating(ratings: $ratings, usedRatings: $usedRatings);
            $usedRatings[] = $playerRating;
            $player = Player::query()->create([
                'name' => fake()->name,
                'rating' => $playerRating
            ]);
            $player->team()->attach($team1->id);
        }

        // for second team
        $usedRatings = [];

        for ($i = 1; $i <= self::PLAYERS_COUNT; $i++) {
            $playerRating = General::generateUniqueRating(ratings: $ratings, usedRatings: $usedRatings);
            $usedRatings[] = $playerRating;
            $player = Player::query()->create([
                'name' => fake()->name,
                'rating' => $playerRating
            ]);
            $player->team()->attach($team2->id);
        }
    }
}
