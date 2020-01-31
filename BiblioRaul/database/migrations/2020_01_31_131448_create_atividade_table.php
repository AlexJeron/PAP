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

        Schema::create('atividade_professor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atividade_id');
            $table->unsignedBigInteger('professor_id');
            $table->timestamps();

            $table->unique(['atividade_id', 'professor_id']);

            $table->foreign('atividade_id')->references('id')->on('atividade')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('professor')->onDelete('cascade');
        });

        Schema::create('atividade_espectador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atividade_id');
            $table->unsignedBigInteger('espectador_id');
            $table->integer('total');
            $table->timestamps();

            $table->unique(['atividade_id', 'espectador_id']);

            $table->foreign('atividade_id')->references('id')->on('atividade')->onDelete('cascade');
            $table->foreign('espectador_id')->references('id')->on('espectador')->onDelete('cascade');
        });

        Schema::create('atividade_turma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atividade_id');
            $table->unsignedBigInteger('turma_id');
            $table->timestamps();

            $table->unique(['atividade_id', 'turma_id']);

            $table->foreign('atividade_id')->references('id')->on('atividade')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turma')->onDelete('cascade');
        });

        Schema::create('atividade_recurso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atividade_id');
            $table->unsignedBigInteger('recurso_id');
            $table->integer('quantidade_necessaria');
            $table->timestamps();

            $table->unique(['atividade_id', 'recurso_id']);

            $table->foreign('atividade_id')->references('id')->on('atividade')->onDelete('cascade');
            $table->foreign('recurso_id')->references('id')->on('recurso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividade_professor');
        Schema::dropIfExists('atividade_turma');
        Schema::dropIfExists('atividade_recurso');
        Schema::dropIfExists('atividade_espectador');
        Schema::dropIfExists('atividade');
    }
}
