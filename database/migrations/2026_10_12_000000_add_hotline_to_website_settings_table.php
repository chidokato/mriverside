<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('website_settings', 'hotline')) {
            Schema::table('website_settings', function (Blueprint $table) {
                $table->string('hotline', 20)->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('website_settings', 'hotline')) {
            Schema::table('website_settings', function (Blueprint $table) {
                $table->dropColumn('hotline');
            });
        }
    }
};
