<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->string('name', 255);
            $table->foreignId('users_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image');
            $table->integer('quantity');
            $table->double('discounts')->default(0);
            $table->double('price');
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('users_id');
            $table->dropColumn('image');
            $table->dropColumn('quantity');
            $table->dropColumn('discounts');
            $table->dropColumn('price');
            $table->dropColumn('status');
        });
    }
};
