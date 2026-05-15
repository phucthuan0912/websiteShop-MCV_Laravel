<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cmts', function (Blueprint $table) {

            $table->renameColumn('id_blog', 'blog_id');

            $table->renameColumn('id_user', 'user_id');

        });
    }

    public function down(): void
    {
        Schema::table('cmts', function (Blueprint $table) {

            $table->renameColumn('blog_id', 'id_blog');

            $table->renameColumn('user_id', 'id_user');

        });
    }
};