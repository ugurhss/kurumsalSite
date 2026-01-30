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
        Schema::create('partner_logos', function (Blueprint $table) {
            $table->id();

            // Logo adı (alt text)
            $table->string('name')->nullable();

            // Logo dosya yolu (svg/png/webp)
            $table->string('logo_path');

            // Yayında mı?
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_logos');
    }
};
