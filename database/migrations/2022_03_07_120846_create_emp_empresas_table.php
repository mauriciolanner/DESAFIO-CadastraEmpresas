<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_empresa', function (Blueprint $table) {
            $table->id('emp_id_emp', 200);
            $table->string('emp_nom_empresa');
            $table->date('emp_dti_atividade');
            $table->date('emp_dtf_atividade')->nullable();
            $table->binary('emp_especial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_empresa');
    }
}
