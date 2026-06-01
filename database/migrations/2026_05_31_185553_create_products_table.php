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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Propojení s kategorií
            $table->string('name'); // Název bublifuku
            $table->decimal('price', 8, 2); // Cena (číslo s dvěma desetinnými místy)
            $table->string('volume')->nullable(); // Objem (např. 500 ml)
            $table->string('image_path')->nullable(); // Cesta k obrázku
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
