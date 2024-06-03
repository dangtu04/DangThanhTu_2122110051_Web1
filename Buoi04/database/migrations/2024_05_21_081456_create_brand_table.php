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
        Schema::create('dtt_brand', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 1000);
            $table->string('slug', 1000);
            $table->string('image', 1000)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('description', 255)->nullable();
            $table->dateTime('created_at');
            $table->unsignedInteger(('create_by'));
            $table->dateTime('updated_at');
            $table->unsignedInteger('update_by');
            $table->unsignedTinyInteger('status')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dtt_brand');
    }
};
