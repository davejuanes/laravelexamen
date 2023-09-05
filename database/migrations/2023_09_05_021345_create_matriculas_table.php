<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudent_id');
            $table->unsignedBigInteger('course_id');
            $table->date('fechamatriculacion');
            $table->integer('nota');
            $table->timestamps();

            $table->foreign('estudent_id')->references('id')->on('estudents')->constrained()->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
