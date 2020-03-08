<?php

use Illuminate\Database\Seeder;

class ConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'param' => 'dias_dev',
            'value' => '7 Days',
            'desc' => 'Dias para devolução do livro'
            ]
        );
        DB::table('configs')->insert([
            'param' => 'multa',
            'value' => '0,50',
            'desc' => 'Valor da multa por atraso'
            ]
        );
    }
}
