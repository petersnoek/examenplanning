<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users', 'roles', 'kwalificatiedossiers', 'proevevanbekwaamheids', 'statuses'];

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

        $this->call(KwalificatiedossierSeeder::class);
        $this->call(ProevevanbekwaamheidSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
//        $this->call(CompaniesSeeder::class);

        Model::reguard();
    }
}
