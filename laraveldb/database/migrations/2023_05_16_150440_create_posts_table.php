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
        //Slug same as title but instead spaces replaced by dashes
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->startingValue(100);
//            $table->unsignedBigInteger('user_id');
//            $table->foreign('user_id')
//                ->references('id')
//                ->on('users')
//                ->cascadeOnDelete();
//             Shortcut
//            $table->foreignId('user_id')
//                ->constrained('users')
//                ->cascadeOnDelete();

            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('excerpt')
                ->comment('Summary of the post');
            $table->longText('description');
            $table->boolean('is_published')
                ->default(false);
            $table->integer('min_to_read')
                ->nullable(false);
            $table->timestamps();
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
