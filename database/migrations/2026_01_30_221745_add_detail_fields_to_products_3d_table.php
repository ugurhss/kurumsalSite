<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products_3d', function (Blueprint $table) {
            // slug
            $table->string('slug')->nullable()->after('title');
            $table->unique('slug');

            // kısa açıklama / uzun açıklama
            // $table->string('short_description', 500)->nullable()->after('slug');
            $table->longText('description')->nullable()->after('short_description');

            // özellikler ve carousel görselleri
            $table->json('specs')->nullable()->after('description');
            $table->json('images')->nullable()->after('specs');

            // fiyat notu + teklif linki
            $table->string('price_note', 255)->nullable()->after('images');
            $table->string('quote_url', 255)->nullable()->after('price_note');
        });
    }

    public function down(): void
    {
        Schema::table('products_3d', function (Blueprint $table) {
            // önce unique index kaldır
            $table->dropUnique(['slug']);

            $table->dropColumn([
                'slug',
                'short_description',
                'description',
                'specs',
                'images',
                'price_note',
                'quote_url',
            ]);
        });
    }
};
