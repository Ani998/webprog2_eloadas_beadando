<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Csak egyszeri importálásra kellenek, nem minden futásnál!
        // $this->call([
        //     FilmSeeder::class,
        //     MoziSeeder::class,
        //     EloadasSeeder::class,
        // ]);
    }
}
