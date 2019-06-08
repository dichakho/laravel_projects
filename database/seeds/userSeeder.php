<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'customer5',
            'phone' => '0971234589',
            'role' => '0',
            'avatar' => 'user.png',
            'email' => 'customer5@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
