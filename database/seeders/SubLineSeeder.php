<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubLine;

class SubLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subline = SubLine::create([
            'name' => "Camisetas Niños",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
            'lineid'=>1,
        ]);

        $subline2 = SubLine::create([
            'name' => "Camisetas Niñas",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
            'lineid'=>1,
        ]);

        $subline3 = SubLine::create([
            'name' => "Camisetas Mujer",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
            'lineid'=>1,
        ]);    
        
        $subline4 = SubLine::create([
            'name' => "Camisetas Hombre",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'stateitem' => 1,
            'lineid'=>1,
        ]);        


        // $subline->save();
        // $subline2->save();
    }
}
