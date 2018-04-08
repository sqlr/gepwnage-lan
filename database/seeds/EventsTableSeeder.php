<?php

use Carbon\Carbon;
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
                'start' => new Carbon('2009-03-28 12:00:00'),
                'end' => new Carbon('2009-03-29 16:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN 2.0',
                'start' => new Carbon('2010-03-27 13:00:00'),
                'end' => new Carbon('2010-03-28 16:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN 3.0',
                'start' => new Carbon('2011-03-19 12:00:00'),
                'end' => new Carbon('2011-03-20 16:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN 4.0',
                'start' => new Carbon('2012-06-08 19:00:00'),
                'end' => new Carbon('2012-06-10 15:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN 5.0',
                'start' => new Carbon('2013-05-03 19:00:00'),
                'end' => new Carbon('2013-05-05 15:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN 6.0',
                'start' => new Carbon('2014-03-21 19:00:00'),
                'end' => new Carbon('2014-03-23 15:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN 7.0 ft. Deloitte',
                'start' => new Carbon('2015-03-13 17:00:00'),
                'end' => new Carbon('2015-03-15 17:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN 8.0 ft. Deloitte',
                'start' => new Carbon('2016-03-04 16:00:00'),
                'end' => new Carbon('2016-03-06 16:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN 9.0',
                'start' => new Carbon('2017-03-03 15:00:00'),
                'end' => new Carbon('2017-03-05 16:00:00'),
            ],
            [
                'name' => 'GEPWNAGE LAN A.0',
                'start' => new Carbon('2018-05-18 19:00:00'),
                'end' => new Carbon('2018-05-20 15:00:00'),
            ],
        ]);
    }
}
