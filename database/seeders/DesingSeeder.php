<?php

namespace Database\Seeders;

use App\Models\Desing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desing::create([
            'name' => "Primer diseño",
            'descrip' => "Descripción Primer Diseño",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
        ]);

        Desing::create([
            'name' => "Segundo diseño",
            'descrip' => "Descripción segundo Diseño",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
        ]);
    }
}
