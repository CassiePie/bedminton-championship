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
        Schema::table('accommodations', function (Blueprint $table) {
            $table->dropColumn([
                'max_capacity', 
                'current_capacity', 
                'breakfast_option', 
                'arrival_date', 
                'departure_date', 
                'number_of_people', 
                'price'
            ]);
            $table->string('website_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accommodations', function (Blueprint $table) {
            $table->integer('max_capacity');
            $table->integer('current_capacity')->default(0);
            $table->boolean('breakfast_option')->default(false);
            $table->date('arrival_date')->nullable();
            $table->date('departure_date')->nullable();
            $table->integer('number_of_people')->nullable();
            $table->float('price')->nullable();
            $table->dropColumn('website_link');
        });
    }
};
