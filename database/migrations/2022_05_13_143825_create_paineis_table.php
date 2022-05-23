<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaineisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paineis', function (Blueprint $table) {
            $table->id();
            $table->string('dsc_nome_painel', 160)->unique();
            $table->string('image');
            $table->text('dsc_descricao_painel')->nullable();
            $table->text('dsc_link_painel');
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
        Schema::dropIfExists('paineis');
    }
}
