<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();

            $table->string('title')->unique();

            $table->string('image_left_path');
            $table->string('image_right_path');

            $table->unsignedSmallInteger('left_order')->default(1);
            $table->unsignedSmallInteger('right_order')->default(2);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['is_active']);
            $table->index(['left_order', 'right_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
