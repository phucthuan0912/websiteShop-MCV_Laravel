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
        Schema::table('products', function (Blueprint $table) {
            $table->string('image', 1000)->change();
            $table->text('detail')->nullable()->after('image');
            $table->string('company')->nullable()->after('detail');
            $table->decimal('sale', 10, 2)->default(0)->after('company');
            $table->tinyInteger('status')->default(0)->comment('0:new, 1:sale')->after('sale');
            $table->unsignedBigInteger('id_category')->nullable()->after('status');
            $table->unsignedBigInteger('id_brand')->nullable()->after('id_category');
            
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['id_category']);
            $table->dropForeign(['id_brand']);
            $table->dropColumn(['detail', 'company', 'sale', 'status', 'id_category', 'id_brand']);
            $table->string('image', 255)->change();
        });
    }
};
