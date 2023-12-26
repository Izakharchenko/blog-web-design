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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->text('text');
            $table->string('cover');
            $table->string('url');
            $table->timestamps();

            
            //index for FK category_id
            $table->index('category_id', 'post_category_idx');
            //FK category_id
            $table->foreign('category_id', 'post_category_fk')->on('categories')->onDelete('no action')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
