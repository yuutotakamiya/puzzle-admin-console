<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('multi_stages', function (Blueprint $table) {
            $table->id();
            $table->integer('multi_stage_id');//マルチステージID
            $table->integer('user_id');//ユーザーのID
            $table->integer('multi_block_num');//マルチステージでブロックを埋めた数
            $table->boolean('result');//完了したかどうか
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multi_stages');
    }
};
