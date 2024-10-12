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
        Schema::create('socialmedia', function (Blueprint $table) {
            $table->id();
            $table->string('social_facebook');
            $table->string('social_github');
            $table->string('social_mail');
            $table->string('social_youtube');
            $table->string('social_twitter');
            $table->string('social_instagram');
            $table->unsignedBigInteger('presentation_id'); 
            $table->timestamps();

            // foreign key presentation
            $table->foreign('presentation_id')->references('id')->on('presentation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socialmedia');
    }
};
