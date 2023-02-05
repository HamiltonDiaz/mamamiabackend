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
        SubLine::create([
            'name' => "Camisetas Infantiles",
            'descrip' => "",
            'image' => "SL_CamisetasInfantil.jpeg",
            'stateitem' => 1,
            'lineid'=>1,
        ]);

        SubLine::create([
            'name' => "Camisetas Damas",
            'descrip' => "",
            'image' => "SL_CamisetasIDama.jpeg",
            'stateitem' => 1,
            'lineid'=>1,
        ]);

        SubLine::create([
            'name' => "Camisetas Hombre",
            'descrip' => "",
            'image' => "SL_CamisetasIHombre.jpeg",
            'stateitem' => 1,
            'lineid'=>1,
        ]);    

        SubLine::create([
            'name' => "Camisetas Unisex",
            'descrip' => "",
            'image' => "SL_CamisetasIHombre.jpeg",
            'stateitem' => 1,
            'lineid'=>1,
        ]);    
        
        SubLine::create([
            'name' => "Pijamas Dama",
            'descrip' => "SL_CamisetasIHombre.jpeg",
            'image' => "",
            'stateitem' => 1,
            'lineid'=>2,
        ]);        

        SubLine::create([
            'name' => "Gorras",
            'descrip' => "",
            'image' => "SL_Gorras.jpeg",
            'stateitem' => 1,
            'lineid'=>3,
        ]);        

        // $subline->save();
        // $subline2->save();
    }
}
