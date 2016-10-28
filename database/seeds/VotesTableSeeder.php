<?php

use Illuminate\Database\Seeder;
use App\Models\Vote;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votes_created = App\Models\Vote::count();
        $this->command->info('Starting at ' . $votes_created . ' vote records');
        while ($votes_created <= 10000) {
            $user_id = App\User::all()->random()->id;
            $recipe_id = App\Models\Recipe::all()->random()->id;
            $vote = App\Models\Vote::where('recipe_id', $recipe_id)->where('user_id', $user_id)->first();
            if (!$vote) {
                $vote = new App\Models\Vote;
                $vote->user_id = $user_id;
                $vote->recipe_id = $recipe_id;
                $vote->vote = mt_rand(0, 1);
                $vote->save();
                $votes_created++;
                $thousands_created = $votes_created / 1000;
                if ($votes_created % 1000 == 0) {
                    $this->command->info('Created ' . $thousands_created . '000 vote recoreds');
                }
            }
        }
        App\Models\Recipe::calculateVoteScore();
    }
}
