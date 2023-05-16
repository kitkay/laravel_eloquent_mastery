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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropSoftDeletes();
            /**
             * or delete a list of columns
             * dropColumn([
             *  col1, col2, col3, colN
             * ])
             */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->softDeletes()
                ->after('min_to_read');
        });
    }
};
