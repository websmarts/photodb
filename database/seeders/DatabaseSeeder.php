<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(1)->create(['email'=>'ian@websmarts.com','name'=>'Ian']);
        \App\Models\User::factory(1)->create(['email'=>'mike@tagsforpots.com.au','name'=>'Mike']);
    }
}
