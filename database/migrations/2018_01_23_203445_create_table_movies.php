<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->index();
            $table->text('description')->nullable();
            $table->year('year')->nullable()->index();
            $table->string('country', 50)->index();
            $table->string('genre', 25)->index();
            $table->string('director', 50)->index();
            $table->float('rating', 4, 2)->nullable()->index();
            $table->integer('duration')->index();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('movies');
    }
}
