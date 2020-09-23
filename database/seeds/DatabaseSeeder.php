<?php

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

        factory(App\Post::class, 50)->create();

        DB::table('users')->insert([
            'name' => 'Jonathan Torralba',
            'email' => 'jtorralba@grupo-sil.com',
            'password' => Hash::make('password'),
        ]);
    }
}
