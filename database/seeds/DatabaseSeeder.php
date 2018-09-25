<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
            $this->command->info("Truncated table: " . $table);

        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

//        $this->call(UserSeeder::class);
//        $this->call(CompaniesSeeder::class);
        $this->call(KwalificatiedossierSeeder::class);
        $this->call(RoleSeeder::class);

        Model::reguard();
    }
}
