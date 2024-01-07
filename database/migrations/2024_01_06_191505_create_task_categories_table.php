<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_categories', function (Blueprint $table) {
            $table->bigIncrements('taskcategory_id'); // Primary key
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('Task_ID')->references('task_id')->on('tasks')->onDelete('cascade');
            // $table->foreign('Category_ID')->references('category_id')->on('categories')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('task_categories');
    }
};
