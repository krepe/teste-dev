<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_livros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('autor');
            $table->string('categoria');
            $table->string('codigo')->unique();
            $table->set('tipo',['Digital','Fisico']);
            $table->unsignedDecimal('tamanho', 8, 6);
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
        Schema::dropIfExists('table_livros');
    }
};
