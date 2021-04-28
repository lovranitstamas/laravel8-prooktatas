<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = new User();
        $admin->name = 'Lovi tomi';
        $admin->email = 'tamas198601@gmail.com';
        $admin->password = \Hash::make('admin123');
        $admin->save();
    }
}
