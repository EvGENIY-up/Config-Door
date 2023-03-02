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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_id')->nullable()->constrained('colors')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('tape_id')->nullable()->constrained('tapes')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('handle_id')->nullable()->constrained('handles')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('width_id')->nullable()->constrained('widths')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('height_id')->nullable()->constrained('heights')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('open_id')->nullable()->constrained('opens')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('decoration_id')->nullable()->constrained('decorations')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('doubledecor_id')->nullable()->constrained('decorations')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')
                ->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
