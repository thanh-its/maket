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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name_blog')->unique();
            $table->string('slug_blog')->unique();
            $table->string('image');
            $table->text('short_description');
            $table->text('description');
            $table->integer('status')->default(0);
            $table->foreignId('users_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cate_blog_id')->constrained('category_blogs')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
