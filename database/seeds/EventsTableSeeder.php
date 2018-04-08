<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Seed the groups table
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'name' => 'GEPWNAGE Lanparty',
            ],
            [
                'name' => 'GEPWNAGE LAN 2.0',
            ],
            [
                'name' => 'GEPWNAGE LAN 3.0',
            ],
            [
                'name' => 'GEPWNAGE LAN 4.0',
            ],
            [
                'name' => 'GEPWNAGE LAN 5.0',
            ],
            [
                'name' => 'GEPWNAGE LAN 6.0',
            ],
            [
                'name' => 'GEPWNAGE LAN 7.0 ft. Deloitte',
            ],
            [
                'name' => 'GEPWNAGE LAN 8.0 ft. Deloitte',
            ],
            [
                'name' => 'GEPWNAGE LAN 9.0',
            ],
            [
                'name' => 'GEPWNAGE LAN A.0',
            ],
        ]);
    }
}
