<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        $rows = DB::table('products_3d')
            ->select(['id', 'title', 'slug'])
            ->whereNull('slug')
            ->orWhere('slug', '')
            ->orderBy('id')
            ->get();

        if ($rows->isEmpty()) {
            return;
        }

        $generated = [];

        foreach ($rows as $row) {
            $base = Str::slug((string) ($row->title ?? ''));
            if ($base === '') {
                $base = 'product-' . $row->id;
            }

            $slug = $base;
            $suffix = 2;

            while (
                isset($generated[$slug]) ||
                DB::table('products_3d')
                    ->where('slug', $slug)
                    ->where('id', '!=', $row->id)
                    ->exists()
            ) {
                $slug = $base . '-' . $suffix;
                $suffix++;
            }

            DB::table('products_3d')->where('id', $row->id)->update(['slug' => $slug]);
            $generated[$slug] = true;
        }
    }

    public function down(): void
    {
        // No-op: backfilled slugs should remain stable.
    }
};

