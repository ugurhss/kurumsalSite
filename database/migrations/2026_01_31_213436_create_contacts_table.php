<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('name', 120);
            $table->string('phone', 30);
            $table->string('email', 190);
            $table->text('message');

            $table->string('status', 30)->default('new'); // new, replied, closed (opsiyonel)

            $table->timestamps();

            $table->index('email');
            $table->index('phone');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
