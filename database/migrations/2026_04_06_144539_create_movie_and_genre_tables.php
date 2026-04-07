<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name')->nullable();
            $table->string('movie_name_vn')->nullable();
            $table->string('original_name')->nullable();
            $table->string('image')->nullable();
            $table->text('image_link')->nullable();
            $table->string('backdrop')->nullable();
            $table->text('backdrop_link')->nullable();
            $table->string('tagline')->nullable();
            $table->string('tagline_vn')->nullable();
            $table->text('overview')->nullable();
            $table->text('overview_vn')->nullable();
            $table->integer('runtime')->nullable();
            $table->bigInteger('budget')->nullable();
            $table->bigInteger('revenue')->nullable();
            $table->float('popularity')->nullable();
            $table->float('vote_average')->nullable();
            $table->integer('vote_count')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();
            $table->text('trailer')->nullable();
            $table->date('release_date')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('genre', function (Blueprint $table) {
            $table->id();
            $table->string('genre_name');
            $table->string('genre_name_vn')->nullable();
        });

        Schema::create('movie_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_movie');
            $table->unsignedBigInteger('id_genre');
            
            $table->foreign('id_movie')->references('id')->on('movie')->onDelete('cascade');
            $table->foreign('id_genre')->references('id')->on('genre')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_genre');
        Schema::dropIfExists('genre');
        Schema::dropIfExists('movie');
    }
};
