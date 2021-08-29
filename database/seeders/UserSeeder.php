<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->unverified()->create([
            'name' => 'Luis Parrado',
            'email' => 'luisprmat@gmail.com'
        ]);

        User::factory()->count(10)->unverified()->create();
    }
}
