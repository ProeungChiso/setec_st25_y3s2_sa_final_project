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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title');
            $table->text('blog_caption')->nullable();
            $table->string('blog_thumbnail')->nullable(); // Multiple or single image URLs
            $table->enum('blog_category', ['PROGRAMMING', 'AI']);
            $table->foreignId('created_by')->constrained('users');
            $table->boolean('is_published')->default(false);
            $table->timestamps(); // includes created_at, updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
