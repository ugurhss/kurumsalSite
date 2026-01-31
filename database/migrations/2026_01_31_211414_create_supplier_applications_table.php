<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('supplier_applications', function (Blueprint $table) {
            $table->id();

            $table->string('full_name', 120);
            $table->string('company', 190);
            $table->string('phone', 30);
            $table->string('email', 190);
            $table->string('city', 100);
            $table->string('product', 190);
            $table->text('details');

            $table->string('status', 30)->default('new'); // new, reviewed, approved, rejected

            $table->timestamps();

            $table->index('email');
            $table->index('phone');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier_applications');
    }
};
