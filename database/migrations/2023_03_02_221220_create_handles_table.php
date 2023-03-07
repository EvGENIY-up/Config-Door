<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('handles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price');
            $table->timestamps();
        });

        $templateArray = [];
        $templateArray[] = ['name' => 'красная', 'price' => 3000];
        $templateArray[] = ['name' => 'синяя', 'price' => 3500];
        $templateArray[] = ['name' => 'зелёная', 'price' => 4000];
        $templateArray[] = ['name' => 'жёлтая', 'price' => 4500];

        DB::table('handles')->insert($templateArray);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handles');
    }
};
