<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users'];

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        Model::unguard();
        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
            $this->command->info("Truncated table: " . $table);

        }

        $this->call(UserSeeder::class);

        Model::reguard();
    }
}
