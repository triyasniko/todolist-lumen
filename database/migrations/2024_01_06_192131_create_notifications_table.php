<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('notification_id'); // Primary key
            $table->unsignedBigInteger('user_id');
            $table->text('notification_message');
            $table->timestamps();

            // Foreign key constraint
            // $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
