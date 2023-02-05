<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Line;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Line::create([
            'name' => "Camisetas",
            'descrip' => "Descripción camisetas",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
        ]);

        Line::create([
            'name' => "Pijamas",
            'descrip' => "Descripción pijamas",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
        ]);

        Line::create([
            'name' => "Gorras",
            'descrip' => "Descripción Gorras",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
        ]);

    }
}
