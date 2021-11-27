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
        try{
            User::create([
                'name' =>  'Admin',
                'email' => 'ulwy03@gmail.com',
                'password' => bcrypt('admin123')
            ]);
        }catch (\Exception $exception){
            dd($exception);
        }
    }
}
