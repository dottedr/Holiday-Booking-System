<?php

use Illuminate\Database\Seeder;

class PublicHolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PublicHoliday::class, 8)->create();
    }
}
