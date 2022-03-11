<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->id('doc_id_doc');
            $table->string('doc_num_documento', 30);
            $table->dateTime('doc_dat_cadastro');
            $table->unsignedBigInteger('doc_id_tdo');
            $table->foreign('doc_id_tdo')->references('tdo_id_tdo')->on('tdo_tipo_documento')->onDelete('cascade');
            $table->unsignedBigInteger('doc_id_emp');
            $table->foreign('doc_id_emp')->references('emp_id_emp')->on('emp_empresa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_documento');
    }
}
