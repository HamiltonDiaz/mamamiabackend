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
        $line = Line::create([
            'name' => "Camisetas",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
        ]);
        // $line->save();
    }
}
