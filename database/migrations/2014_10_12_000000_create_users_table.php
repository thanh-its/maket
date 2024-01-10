<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar', 150);
            $table->string('fullname')->nullable();
            $table->string('address', 200)->nullable();
            $table->string('address_detail', 200)->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->string('status');
            $table->boolean('is_admin')->default(false); // có phải admin 
            $table->unsignedInteger('group_user')->nullable();
            // nhóm khách hàng
            $table->foreign('group_user')->references('id')->on('group_users')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
