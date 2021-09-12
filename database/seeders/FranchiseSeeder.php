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
            'pattern' => '^3[47][0-9]{5,}$',
            'min' => '15',
            'max' => '15'
        ]);

        DB::table('franchises')->insert([
            'name' => 'Diners Club',
            'pattern' => '^3(?:0[0-5]|[68][0-9])[0-9]{4,}$',
            'min' => '16',
            'max' => '16'
        ]);

        DB::table('franchises')->insert([
            'name' => 'Discover',
            'pattern' => '^6(?:011|5[0-9]{2})[0-9]{3,}$',
            'min' => '16',
            'max' => '19'
        ]);

        DB::table('franchises')->insert([
            'name' => 'JCB',
            'pattern' => '^(?:2131|1800|35[0-9]{3})[0-9]{3,}$',
            'min' => '16',
            'max' => '19'
        ]);

        DB::table('franchises')->insert([
            'name' => 'MasterCard',
            'pattern' => '^5[1-5]',
            'min' => '16',
            'max' => '16'
        ]);

        DB::table('franchises')->insert([
            'name' => 'Visa',
            'pattern' => '^4[0-9]{6,}$',
            'min' => '13',
            'max' => '16'
        ]);
    }
}
