<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class QuestionaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('questionaires') == false) {
            $this->command->warn("Seeding questionaires failed; table 'questionaires' doesn't exist in database...");
            return;
        }

        $amount = 15;
        $faker = Faker::create('nl_NL');
        $users = User::inRandomOrder()->get();

        foreach(range(1, $amount) as $index)
        {
            DB::table('questionaires')->insert([
                'vraag1' => substr($faker->sentence, 0, -1) . "?",
                'vraag2' => substr($faker->sentence, 0, -1) . "?",
                'user_id' => $users->pop()->id,
            ]);
        }
        $this->command->info('Seeded ' . $amount . ' questionaires');
    }
}
