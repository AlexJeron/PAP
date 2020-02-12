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
            $table->unsignedBigInteger('recurso_id')->nullable();
            $table->timestamp('inicio');
            $table->timestamp('fim')->nullable();
            $table->integer('total_espectadores');
            $table->string('outros_espectadores')->nullable();
            $table->integer('num_recursos')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');

            $table->foreign('local_id')
                ->references('id')
                ->on('local')
                ->onDelete('cascade');

            $table->foreign('recurso_id')
                ->references('id')
                ->on('recurso')
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

        Schema::create('atividade_turma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atividade_id');
            $table->unsignedBigInteger('turma_id');
            $table->timestamps();

            $table->unique(['atividade_id', 'turma_id']);

            $table->foreign('atividade_id')->references('id')->on('atividade')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turma')->onDelete('cascade');
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
        Schema::dropIfExists('atividade');
    }
}