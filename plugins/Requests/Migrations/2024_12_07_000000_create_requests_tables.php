<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_number', 10);
            $table->string('status', 20)->default('Nieuw');
            $table->string('gender', 10);
            $table->string('name', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('street', 100);
            $table->string('house_number', 10);
            $table->string('addition', 10)->nullable();
            $table->string('postal_code', 6);
            $table->string('city', 100);
            $table->string('email', 100);
            $table->string('phone', 20)->nullable();
            $table->json('custom_questions')->nullable(); // Voor de flexibele vragen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};