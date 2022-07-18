<?php

namespace Database\Seeders;

use App\Models\StateItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StateItem::updateOrCreate(['descrip'=>'activo']);
        StateItem::updateOrCreate(['descrip'=>'inactivo']);
        StateItem::updateOrCreate(['descrip'=>'eliminado']);
    }
}
