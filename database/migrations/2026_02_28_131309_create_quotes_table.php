<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('service');
            $table->string('budget');
            $table->date('deadline')->nullable();
            $table->text('details');
            $table->enum('status', ['new', 'in_review', 'sent', 'accepted', 'declined'])->default('new');
            $table->boolean('read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};