<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('last_login_at')->nullable()->after('is_admin');
            $table->timestamp('last_seen_at')->nullable()->after('last_login_at');
        });

        Schema::create('site_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('event', 80)->index();
            $table->string('category', 40)->index();
            $table->string('description');
            $table->nullableMorphs('subject');
            $table->string('route')->nullable()->index();
            $table->string('method', 10)->nullable();
            $table->string('ip_hash', 64)->nullable()->index();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['created_at', 'category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_activities');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['last_login_at', 'last_seen_at']);
        });
    }
};
