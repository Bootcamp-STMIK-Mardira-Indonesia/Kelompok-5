<?php

namespace App\Database\Migrations;

use App\Core\Migration;
use App\Core\Blueprint;
use App\Core\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('partnerships', function (Blueprint $table) {
            $table->increment('id');
            $table->string('name', 50);
            $table->string('alamat', 200);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partnerships');
    }
};