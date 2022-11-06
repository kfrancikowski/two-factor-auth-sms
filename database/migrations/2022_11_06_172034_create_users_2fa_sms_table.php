<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_2fa_sms', function (Blueprint $table) {
            $table->id();
            $table->morphs('authenticatable');
            $table->string('phone');
            $table->string('code');
            $table->string('status');
            $table->smallInteger('failed_attempts')->default(0);
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_2fa_sms');
    }
};
