<?php

use App\Models\Category;
use App\Models\Groupe;
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
        // $this->call(UsersTableSeeder::class);
        Groupe::factory(5)->create();
        Category::factory(5)->create();
    }
}
