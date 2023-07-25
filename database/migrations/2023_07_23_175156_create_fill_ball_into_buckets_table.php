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
        Schema::create('fill_ball_into_buckets', function (Blueprint $table) {
            $table->id();
            $table->integer('bucket_id');
            $table->integer('ball_id');
            $table->double('free_space')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fill_ball_into_buckets');
    }
};
