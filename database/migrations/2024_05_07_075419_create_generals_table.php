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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('site_logo')->nullable();
            $table->string('site_logo_white')->nullable();
            $table->string('site_logo_footer')->nullable();
            $table->string('site_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->longText('site_slogan');
            $table->text('active_time');

            $table->string('links_1_name');
            $table->string('links_1')->default('#');
            $table->string('links_2_name')->nullable();
            $table->string('links_2')->nullable();
            $table->string('links_3_name')->nullable();
            $table->string('links_3')->nullable();
            $table->string('links_4_name')->nullable();
            $table->string('links_4')->nullable();

            $table->string('facebook')->default('#');
            $table->string('instagram')->default('#');
            $table->string('twitter')->default('#');
            $table->string('youtube')->default('#');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};
