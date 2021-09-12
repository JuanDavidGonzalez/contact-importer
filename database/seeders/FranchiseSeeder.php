<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FranchiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('franchises')->insert([
            'name' => 'American Express',
        ]);

        DB::table('franchises')->insert([
            'name' => 'Diners Club',
        ]);

        DB::table('franchises')->insert([
            'name' => 'Discover',
        ]);

        DB::table('franchises')->insert([
            'name' => 'JCB',
        ]);

        DB::table('franchises')->insert([
            'name' => 'MasterCard',
        ]);

        DB::table('franchises')->insert([
            'name' => 'Visa',
        ]);
    }
}
