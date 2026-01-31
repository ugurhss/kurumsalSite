<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();

            $table->string('full_name', 120);
            $table->string('phone', 30);
            $table->string('email', 190);
            $table->string('company', 190);
            $table->string('city', 100);
            $table->string('product', 190);
            $table->text('details');

            // İstersen: durum takibi
            $table->string('status', 30)->default('new'); // new, contacted, closed...

            $table->timestamps();

            // Opsiyonel indexler
            $table->index('email');
            $table->index('phone');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
