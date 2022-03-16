<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80);
            $table->string('cpf', 12)->unique();
            $table->string('telefone1', 13);
            $table->string('telefone2', 13)->nullable();
            $table->date('nascimento');
            $table->string('cep', 9)->nullable();
            $table->string('logradouro', 60)->nullable();
            $table->string('numero', 15)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('uf', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
