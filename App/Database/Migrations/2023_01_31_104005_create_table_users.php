<?php

namespace App\Database\Migrations;

use App\Core\Migration;
use App\Core\Blueprint;
use App\Core\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increment('id');
            $table->string('name', 50);
            $table->string('no_telp', 15)->nullable();
            $table->string('username', 25)->unique('username');
            $table->string('password', 64);
            $table->integer('role_id');
            $table->index('role_id');
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
