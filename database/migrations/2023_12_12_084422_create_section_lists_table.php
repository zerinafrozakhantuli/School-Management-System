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
        Schema::create('section_lists', function (Blueprint $table) {
            $table->bigIncrements('seclist_id');
            $table->string('seclist_name',20)->unique();
            $table->string('seclist_info',150)->nullable();
            $table->string('seclist_slug',30)->nullable();
            $table->integer('seclist_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_lists');
    }
};
