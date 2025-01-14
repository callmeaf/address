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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('addressable');
            $table->foreignIdFor(config('callmeaf-province.model'))->nullable()->constrained()->cascadeOnDelete();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_default');
            $table->string('full_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('national_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
