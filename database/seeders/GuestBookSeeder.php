<?php

namespace Database\Seeders;

use App\Models\GuestBook;
use Illuminate\Database\Seeder;

class GuestBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GuestBook::factory(3)
            ->create();
    }
}
