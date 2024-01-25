<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Antrian;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
		
		User::create([
			'name' => 'Deddy',
			'email' => 'deddy@gmail.com',
			'password' => bcrypt('password'),
			'role' => 'admin'
        ]);
		
		Antrian::create([
            'tanggal' => date("Y-m-d H:i:s"),
            'nomor' => 1,
			'status' => 'mulai',
            'users_id'=> 1
        ]);
		
		Antrian::create([
            'tanggal' => date("Y-m-d H:i:s"),
            'nomor' => 2,
			'status' => 'mulai',
            'users_id'=> 1
        ]);
		
		Antrian::create([
            'tanggal' => date("Y-m-d H:i:s"),
            'nomor' => 3,
			'status' => 'mulai',
            'users_id'=> 1
        ]);
		
		Antrian::create([
            'tanggal' => date("Y-m-d H:i:s"),
            'nomor' => 4,
			'status' => 'mulai',
            'users_id'=> 1
        ]);
		
		Antrian::create([
            'tanggal' => date("Y-m-d H:i:s"),
            'nomor' => 5,
			'status' => 'mulai',
            'users_id'=> 1
        ]);
    }
}
