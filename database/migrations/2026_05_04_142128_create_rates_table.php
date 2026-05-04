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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');

            $table->foreignId('blog_id')
              ->constrained('blogs')   // liên kết tới bảng blogs
              ->onDelete('cascade');   // xoá blog → xoá luôn rate

            // lưu id user đã rate
            $table->foreignId('user_id')
                ->constrained('users')   // liên kết tới bảng users
                ->onDelete('cascade');   // xoá user → xoá rate

            // tránh 1 user rate nhiều lần 1 bài
            $table->unique(['blog_id', 'user_id']);

            // tạo created_at và updated_at
            $table->timestamps();
                
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
