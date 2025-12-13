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
        Schema::create('mega_menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('mega_menu_groups')->cascadeOnDelete();
            $table->string('label');      // Nama item
            $table->string('url')->nullable();
            $table->string('icon')->nullable(); // opsional: ikon
            $table->text('description')->nullable(); // opsional: deskripsi
            $table->integer('order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mega_menu_items');
    }
};
