<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Articles\Category;
use App\Models\Articles\Subject;

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
        Category::create([
            'name' => 'Esportes',
        ]);
        Category::create([
            'name' => 'Politica',
        ]);

        Subject::create([
            'name' => 'Futebol',
            'category_id' => '1',
        ]);

        Subject::create([
            'name' => 'Volei',
            'category_id' => '1',
        ]);

        Subject::create([
            'name' => 'Senado',
            'category_id' => '2',
        ]);



    }
}
