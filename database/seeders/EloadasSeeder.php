<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EloadasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('eloadas')->truncate();

        DB::statement("SET NAMES 'utf8mb4'");
        DB::statement("SET CHARACTER SET utf8mb4");
        DB::statement("SET collation_connection = 'utf8mb4_hungarian_ci'");

        $path = database_path('seeders/data/eloadas.txt');
        $file = fopen($path, 'r');

        while (($line = fgets($file)) !== false) {
            $parts = explode("\t", trim($line));

            // ha nem 5 mező van, ugrás
            if (count($parts) < 5) {
                continue;
            }

            DB::table('eloadas')->insert([
                'filmid' => $parts[0],
                'moziid' => $parts[1],
                'datum' => $parts[2],
                'nezoszam' => $parts[3],
                'bevetel' => $parts[4],
            ]);
        }

        fclose($file);
    }
}
