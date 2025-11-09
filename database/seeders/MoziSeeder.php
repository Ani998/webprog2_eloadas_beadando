<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoziSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mozi')->truncate();

        DB::statement("SET NAMES 'utf8mb4'");
        DB::statement("SET CHARACTER SET utf8mb4");
        DB::statement("SET collation_connection = 'utf8mb4_hungarian_ci'");

        $path = database_path('seeders/data/mozi.txt');
        $file = fopen($path, 'r');

        while (($line = fgets($file)) !== false) {
            $parts = explode("\t", trim($line));

            // ha nem 4 mező van, ugrás
            if (count($parts) < 4) {
                continue;
            }

            DB::table('mozi')->insert([
                'id' => $parts[0],
                'neve' => $parts[1],
                'varos' => $parts[2],
                'ferohely' => $parts[3],
            ]);
        }

        fclose($file);
    }
}
