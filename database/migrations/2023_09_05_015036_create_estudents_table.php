<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudents', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('paterno', 50);
            $table->string('materno', 50);
            $table->string('email', 100);
            $table->string('ci', 10);
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
        Schema::dropIfExists('estudents');
    }
}
