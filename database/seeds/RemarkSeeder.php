<?php

use App\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class RemarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('remarks') == false) {
            $this->command->warn("Seeding remarks failed; table 'remarks' doesn't exist in database...");
            return;
        }

        $amount = 52;
        $faker = Faker::create('nl_NL');
        $users = User::inRandomOrder()->get();

        foreach(range(1, $amount) as $index)
        {
            DB::table('remarks')->insert([
                'body' => $faker->sentence,
                'user_id' => $users->pop()->id,
            ]);
        }
        $this->command->info('Seeded ' . $amount . ' remarks');
    }
}
