<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(
      [
          [
            'user_name' => 'Kamal shaheen',
            'user_email' => 'Kamal@thinkdeep.ps',
            'user_type' => 'sa',
            'password' => \Hash::make('Kamal@thinkdeep.ps'),
          ],
          [
            'user_name' => 'Fouad Hawash',
            'user_email' => 'hawash.fouad@gmail.com',
            'user_type' => 'sa',
            'password' => \Hash::make('hawash.fouad@gmail.com'),
          ],
          [
            'user_name' => 'SP1',
            'user_email' => 'sp1@gmail.com',
            'user_type' => 'sp',
            'password' => \Hash::make('sp1@gmail.com'),
          ]
      ]);
    }
}
