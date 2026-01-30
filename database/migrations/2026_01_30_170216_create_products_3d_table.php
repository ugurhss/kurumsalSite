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
        Schema::create('products_3d', function (Blueprint $table) {
            $table->id();

            // Ürün başlığı (örn: "3D Ürünlerimiz")
            $table->string('title')->nullable();

            // 3D model dosyası (.glb / .gltf)
            $table->string('model_path');

            // Görünürlük
            $table->boolean('is_active')->default(true);

         

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_3d');
    }
};
