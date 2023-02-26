<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mail_offers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('desc')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mail_offers');
    }
};
