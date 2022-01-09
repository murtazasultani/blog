<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$json = File::get(base_path().'/database/seeders/data/users.json');

		$users = json_decode($json);

		foreach ($users as $user) {

            User::create([
                'name'                      => $user->name,
                'title'                     => $user->title,
                'email'                     => $user->email,
                'email_verified_at'         => now(),
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token'            => Str::random(10)
            ]);

        }
    }
}