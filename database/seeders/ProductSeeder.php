<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subline = Product::create([
            'name' => "Producto Camisetas Niños",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'price' => 50000,
            'stateitem' => 1,
            'sublineid'=>1,
        ]);

        $subline2 = Product::create([
            'name' => "Producto Camisetas Niñas",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'price' => 60000,
            'stateitem' => 1,
            'sublineid'=>1,
        ]);

        $subline3 = Product::create([
            'name' => "Producto Camisetas Mujer",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'price' => 70000,
            'stateitem' => 1,
            'sublineid'=>2,
        ]);    
        
        $subline4 = Product::create([
            'name' => "Producto Camisetas Hombre",
            'descrip' => "Prenda de vestir para toda la familia",
            'image' => "imglinecamiseta.png",
            'price' => 80000,
            'stateitem' => 1,
            'sublineid'=>4,
        ]);   
    }
}
