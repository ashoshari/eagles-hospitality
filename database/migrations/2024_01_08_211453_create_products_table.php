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
            $table->string("name");
            $table->string("nameAr");
            $table->string("size");
            $table->text("description");
            $table->text("descriptionAr");
            $table->integer("quantityPerPacket");
            $table->boolean("bestSelling");
            $table->string("imageUrl");
            $table->string("public_id");
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

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
