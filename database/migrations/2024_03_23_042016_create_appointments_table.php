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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('first');
            $table->string('middle')
                ->nullable();
            $table->string('last');
            $table->string('fullname')
            ->nullable();
            $table->string('phone');
            $table->string('age');
            $table->string('gender');
            $table->string('unit')
            ->nullable();
            $table->string('barangay')
            ->nullable();
            $table->string('city')
            ->nullable();
            $table->string('province')
            ->nullable();
            $table->timestamp('date')
            ->nullable();
            $table->string('fee')
            ->nullable();
            $table->foreignId('doctor_user_id')
            ->contrained()
            ->nullable()
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->contrained()
            ->nullable()
            ->onDelete('cascade');
            $table->foreignId('service_id')
            ->contrained()
            ->nullable()
            ->onDelete('cascade');
            $table->string('status')
            ->nullable()
            ->default('pending');
            $table->string('appointment_number')
            ->nullable();
            $table->time('time')
            ->nullable();
            $table->string('note')
            ->nullable();
            $table->string('finished')
            ->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
