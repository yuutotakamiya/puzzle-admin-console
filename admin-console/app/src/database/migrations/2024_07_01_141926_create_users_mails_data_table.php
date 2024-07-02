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
        Schema::create('user_mails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');//ユーザーのid
            $table->integer('mail_id');//メールのid
            $table->string('condition');//受け取っているかの状態
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_mails');
    }
};
