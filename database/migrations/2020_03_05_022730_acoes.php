<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Acoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo',['Retirada', 'Devolução']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('livro_id');
            $table->date('data_acao')->default(date('y-m-d H:i:s'));
            $table->date('data_devolucao')->nullable()->default(date('y-m-d H:i:s',strtotime('+ 7 days')));
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
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
        Schema::dropIfExists('acoes');
    }
}
