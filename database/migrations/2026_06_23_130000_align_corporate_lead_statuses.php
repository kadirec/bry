<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('corporate_leads')->where('status', 'won')->update(['status' => 'done']);
        DB::table('corporate_leads')->where('status', 'lost')->update(['status' => 'archived']);

        Schema::table('corporate_leads', function (Blueprint $table) {
            $table->string('status', 20)->default('new')->change();
        });
    }

    public function down(): void
    {
        DB::table('corporate_leads')->where('status', 'done')->update(['status' => 'won']);
        DB::table('corporate_leads')->where('status', 'archived')->update(['status' => 'lost']);

        Schema::table('corporate_leads', function (Blueprint $table) {
            $table->string('status', 20)->default('new')->change();
        });
    }
};
