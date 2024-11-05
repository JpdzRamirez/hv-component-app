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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->longText('company_logo')->nullable();
            $table->string('company');
            $table->string('position'); 
            $table->string('main_role');
            $table->mediumText('goals');
            $table->boolean('status_working')->default(true);
            $table->date('start_date'); 
            $table->date('end_date')->nullable();
            $table->integer('rank_company')->default(0)->comment('Puntaje de 0 a 5');
            $table->integer('rank_enviroment')->default(0)->comment('Puntaje de 0 a 5');
            $table->boolean('recommend');
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
        Schema::dropIfExists('experiences');
    }
};
