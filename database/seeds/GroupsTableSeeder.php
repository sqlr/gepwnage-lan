<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Seed the groups table
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'slug' => 'gepwnage',
                'name' => 'GEPWNAGE',
            ],
            [
                'slug' => 'gewis',
                'name' => 'GEWIS',
            ],
            [
                'slug' => 'external',
                'name' => 'External',
            ],
        ]);
    }
}
