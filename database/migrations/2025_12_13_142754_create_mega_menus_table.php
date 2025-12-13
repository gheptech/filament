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
        Schema::create('mega_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');       // Nama mega menu, misalnya "Produk"
            $table->string('slug')->unique(); // Slug unik, misalnya "mega-produk"
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mega_menus');
    }
};
