<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->default('default_profile.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->boolean('category')->nullable();
            $table->boolean('subcategory')->nullable();
            $table->boolean('division')->nullable();
            $table->boolean('district')->nullable();
            $table->boolean('post')->nullable();
            $table->boolean('widget')->nullable();
            $table->boolean('ads')->nullable();
            $table->boolean('permission')->nullable();
            $table->boolean('gallery')->nullable();
            $table->boolean('setting')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
