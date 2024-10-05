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
        Schema::create('studys', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('institute'); 
            $table->date('start_date'); 
            $table->date('end_date')->nullable(); 
            $table->mediumText('description')->nullable();
            $table->string('skills',500);  
            $table->string('status',50); 
            $table->unsignedBigInteger('presentation_id'); 
            $table->timestamps();

            //Llave Foranea
            $table->foreign('presentation_id')->references('id')->on('presentation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studys');
    }
};
