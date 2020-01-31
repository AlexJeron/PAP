<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividade', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('local_id');
            $table->timestamp('inicio');
            $table->timestamp('fim')->nullable();
            $table->string('observacao')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');

            $table->foreign('local_id')
                ->references('id')
                ->on('local')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividade');
    }
}