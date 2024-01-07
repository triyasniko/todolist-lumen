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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('task_id'); // Menggunakan 'task_id' sebagai primary key
            $table->unsignedBigInteger('user_id');
            $table->string('task_name');
            $table->text('description')->nullable();
            $table->string('due_date');
            $table->enum('status', ['pending', 'completed', 'in_progress'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->timestamps();

            // Menambahkan foreign key constraint untuk user_id
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
