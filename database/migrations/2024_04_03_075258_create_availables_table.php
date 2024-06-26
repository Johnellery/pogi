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
        Schema::create('availables', function (Blueprint $table) {
            $table->id();
            $table->string('note')
            ->nullable();
            $table->timestamp('date')
            ->nullable();
            $table->string('status')
            ->nullable()
            ->default('pending');
            $table->foreignId('user_id')
            ->contrained()
            ->nullable()
            ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availables');
    }
};
