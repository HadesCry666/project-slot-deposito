<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, textarea
            $table->string('section')->default('general'); // hero, slot, deposito, nasihat, fakta
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_contents');
    }
};
