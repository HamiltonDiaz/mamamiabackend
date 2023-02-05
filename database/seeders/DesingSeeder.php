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
            'name' => "Ciao, bambino",
            'descrip' => "Nuestra primera colección para bambinos y bambinas fue diseña para alegrar el look de los niños con los animalitos de la selva que tanto les gusta.",
            'image' => "Ciao, Bambino.jpeg",
            'stateitem' => 1,
        ]);

        Desing::create([
            'name' => "Coffe time",
            'descrip' => "Un diseño original para los amantes del café.",
            'image' => "Coffe time.jpeg",
            'stateitem' => 1,
        ]);
    }
}
