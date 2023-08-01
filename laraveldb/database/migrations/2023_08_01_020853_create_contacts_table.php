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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') //method creates an UNSIGNED BIGINT equivalent column
                ->constrained('users') //determine the table and column being referenced
                ->cascadeOnDelete(); //delete the associated contact when user is deleted
            $table->string('address');
            $table->string('number');
            $table->string('city');
            $table->string('zip_code');
            $table->unique(['address', 'zip_code']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
