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
        Product::create(['name' => '¡1,2,3 por mí!', 'descrip' => 'Nuestra primera colección para bambinos y bambinas fue diseña para alegrar el look de los niños con los animalitos de la selva que tanto les gusta.', 'image' => '1,2,3 por mí.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 1]);
        Product::create(['name' => 'Águila a blanco y negro', 'descrip' => 'Este diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Águila en blanco y negro.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 1]);
        Product::create(['name' => 'Ancestral', 'descrip' => 'Un diseño que es un homenaje a nuestras raíces indígenas colombianas', 'image' => 'Ancestral.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => '¡Arrivederchi', 'descrip' => 'Nuestra primera colección para bambinos y bambinas fue diseña para alegrar el look de los niños con los animalitos de la selva que tanto les gusta.', 'image' => 'Arrivederchi.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 1]);
        Product::create(['name' => 'Buonanotte', 'descrip' => 'Este diseño para pijamas está inspirado en la tranquilidad de la noche y su nombre nos recuerda a la bella Italia, país que es nuestra fuente de inspiración', 'image' => 'Buonanotte.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 5]);
        Product::create(['name' => 'Chica arcoiris', 'descrip' => 'Este diseño es una explosión de color que hace parte de la línea de rostros de nuestra marca', 'image' => 'Chica arcoiris.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Chica con mariposa en su gorra', 'descrip' => 'Un precioso diseño casual que nos recuerda la importancioa de las cosas simples', 'image' => 'Chica con mariposa en su gorra.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Chica con rizos', 'descrip' => 'Este bello rostro de una chica rizada es un homenaje a belleza latina y demuestra el gran interés que nuestra artista siente por los rostros', 'image' => 'Chica con rizos.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Colazione', 'descrip' => 'Este diseño en el que priman los tonos rojos nos recuerdan los deliciosos desayunos italianos. Puede ser pijama o camiseta.', 'image' => 'Colazione.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 5]);
        Product::create(['name' => 'Cuore di artista', 'descrip' => 'Es un diseño muy especial porque representa nuestro amor por el arte. Es el corazón de nuestra artista Viena.', 'image' => 'Cuore di artista.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 4]);
        Product::create(['name' => 'El pescador de barú', 'descrip' => 'Este es un homenaje a nuestra música, nuestras tradiciones y costumbres colombianas', 'image' => 'El pescador de Barú.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 3]);
        Product::create(['name' => 'Elefantástico', 'descrip' => 'Nuestra primera colección para bambinos y bambinas fue diseña para alegrar el look de los niños con los animalitos de la selva que tanto les gusta.', 'image' => 'Elefantástico.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 1]);
        Product::create(['name' => 'Gato negro en muro', 'descrip' => 'Este diseño original a blanco y negro hace parte de la línea NATURA que incluye todos los diseños de paisajes, animalitos y belleza natural porque somos fans de la naturaleza', 'image' => 'Gato negro en muro.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Girasoles con Monarca', 'descrip' => 'Este colorido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Girasoles con Monarca.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'hope', 'descrip' => 'Este diseño es muy especial para nosotros. Con HOPE empezó Mamma mía, Viena. Está inspirado en la esperanza de que un mejor porvenir es posible y en que los sueños pueden hacerse realidad. ….', 'image' => 'Hope.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'I fiori', 'descrip' => 'Este diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'I fiori.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Liam nocturno', 'descrip' => 'Un homenaje al respeto por la diferencia y una declaración de amor incondicional', 'image' => 'Liam nocturno.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 1]);
        Product::create(['name' => 'Madmoiselle fleur', 'descrip' => 'Este colorido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Madmoiselle fleur.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Margaritas con cielo azul', 'descrip' => 'Este colorido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Margaritas con cielo azul.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Mariquita sobre hoja verde', 'descrip' => 'Este colorido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Mariquita sobre hoja verde.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 1]);
        Product::create(['name' => 'Mirada con peces', 'descrip' => 'Este diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Mirada con peces.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Mujer caderona', 'descrip' => 'Una vez más nuestra marca rinde homenaje a la belleza latina con este bello diseño', 'image' => 'Mujer caderona.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Mujer de pie con atardecer', 'descrip' => 'Este colorido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Mujer con atardecer.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Mujer con sombrero rojo', 'descrip' => 'Este diseño está hecho a mano, como muchos de nuestros diseños, y refleja el glamour y la elegancia de la mujer', 'image' => 'Mujer con sombrero rojo.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Mujer con sombrero y atardecer', 'descrip' => 'Este colorido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Mujer contemplando el atardecer.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Mujer en tocador', 'descrip' => 'Un diseño original que evoca la belleza de lo simple con trazos libres a blanco y negro', 'image' => 'Mujer en tocador.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => 'Natura', 'descrip' => 'Este diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Natura.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 4]);
        Product::create(['name' => 'Natural sweet', 'descrip' => 'Este colorido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Natural sweet.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 5]);
        Product::create(['name' => 'Pareja de delfines', 'descrip' => 'Este diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Pareja de delfines.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 4]);
        Product::create(['name' => 'Siembra besos', 'descrip' => 'El amor es el motor que lo mueve todo y este diseño es un homenaje al él', 'image' => 'Siembra besos.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
        Product::create(['name' => '¡Te encontré!', 'descrip' => 'Nuestra primera colección para bambinos y bambinas fue diseña para alegrar el look de los niños con los animalitos de la selva que tanto les gusta.', 'image' => 'Te encontré.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 1]);
        Product::create(['name' => 'Tulipanes pijama', 'descrip' => 'Este colorido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Tulipanes pijama.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 5]);
        Product::create(['name' => 'Un mundo extraordinario', 'descrip' => 'En una explosión de color y creatividad este diseño refleja el deseo de un mundo más incluyente y feliz', 'image' => 'Un mundo extraordinario.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 1]);
        Product::create(['name' => 'Velero con atardecer', 'descrip' => 'Este cálido diseño hace parte de la línea NATURA que incluye todos los diseños de paisajes y belleza natural porque somos fans de la naturaleza', 'image' => 'Velero con atardecer.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 4]);
        Product::create(['name' => 'Whatever, baby', 'descrip' => 'Un diseño original que recuerda el estilo Pop Art y que hace parte de la línea de rostros de nuestra marca', 'image' => 'Whatever, baby.jpeg', 'price' => 50000, 'stateitem' => 1, 'sublineid' => 2]);
       
    }
}
