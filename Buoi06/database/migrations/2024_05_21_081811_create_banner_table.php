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
        Schema::create('dtt_banner', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1000);
            $table->string('link', 1000);
            $table->string('slug', 1000)->nullable();
            $table->unsignedInteger('sort_order')->default(1);
            $table->string('position', 50);
            $table->string('description', 255)->nullable();
            $table->dateTime('created_at');
            $table->unsignedInteger('created_by');
            $table->dateTime('updated_at')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->tinyInteger('status', 2)->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dtt_banner');
    }
};
