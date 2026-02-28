<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client');
            $table->year('year');
            $table->json('tags')->nullable();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('cover_image')->nullable(); // emoji or path
            $table->json('gallery')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};