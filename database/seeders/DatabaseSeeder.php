<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmpEmpresa;
use App\Models\TdoTipoDocumento;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        EmpEmpresa::factory(5)->create();
        TdoTipoDocumento::factory(5)->create();
    }
}
