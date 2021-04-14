<?php

use Illuminate\Database\Seeder;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('actividades')->truncate();

        $actividades = [
            [
                'titulo'     => 'Entrada para el Castillo Encantado de Trigueros del Valle',
                'fecha_desde'  => '2021-05-01',
                'fecha_hasta'      => '2021-05-10',
                'precio_persona'      => '6',
                'popularidad'   => '1',                
            ],
            [
                'titulo'     => 'Tour de las mujeres ilustres de Madrid',
                'fecha_desde'  => '2021-05-15',
                'fecha_hasta'      => '2021-05-25',
                'precio_persona'      => '2',
                'popularidad'   => '2',                
            ],
            [
                'titulo'     => 'Tour por la Quinta de los Molinos',
                'fecha_desde'  => '2021-06-01',
                'fecha_hasta'      => '2021-06-10',
                'precio_persona'      => '4',
                'popularidad'   => '3',                
            ],
            [
                'titulo'     => 'Tour de la Inquisición por Madrid',
                'fecha_desde'  => '2021-04-10',
                'fecha_hasta'      => '2021-06-20',
                'precio_persona'      => '5',
                'popularidad'   => '4',                
            ],
            [
                'titulo'     => 'Tour por el Madrid de los misterios',
                'fecha_desde'  => '2021-04-01',
                'fecha_hasta'      => '2021-07-20',
                'precio_persona'      => '12',
                'popularidad'   => '5',                
            ],
        ];

        DB::table('actividades')->insert($actividades);
        Schema::enableForeignKeyConstraints();
    }
}
