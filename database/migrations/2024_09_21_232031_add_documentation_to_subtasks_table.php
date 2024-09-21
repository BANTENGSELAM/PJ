<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::table('subtasks', function (Blueprint $table) {
        $table->string('documentation')->nullable(); // untuk menyimpan path dokumen
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subtasks', function (Blueprint $table) {
            //
        });
    }
};
