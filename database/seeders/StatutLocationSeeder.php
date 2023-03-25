<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statut_locations')->insert([
            'nom' =>"En attente", 
            'nom' => "En cours", 
            'nom' => "Terminée",  
        ]);
    }
}
