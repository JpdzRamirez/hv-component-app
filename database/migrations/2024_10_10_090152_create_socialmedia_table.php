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
            $table->string('linkedin');
            $table->string('linkedin_terms');
            $table->string('facebook');
            $table->string('facebook_terms');
            $table->string('github');
            $table->string('github_terms');
            $table->string('office365');
            $table->string('office365_terms');
            $table->string('youtube');
            $table->string('youtube_terms');
            $table->string('twitter');
            $table->string('twitter_terms');
            $table->string('instagram');
            $table->string('instagram_terms');
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
