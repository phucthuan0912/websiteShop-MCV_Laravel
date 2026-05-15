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
        Schema::create('cmts', function (Blueprint $table) {
            $table->id();
            $table->String('cmt');
            $table->String('avatar');
            $table->unsignedBigInteger('id_blog');
            $table->unsignedBigInteger('id_user');
            $table->string('name')->nullable();
            $table->integer('level')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmts');
    }
};
