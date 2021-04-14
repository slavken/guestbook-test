<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'admin',
            'moderator',
            'writer'
        ];

        foreach ($data as $name) {
            Role::factory()
                ->create(['name' => $name]);
        }
    }
}
