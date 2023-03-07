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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price');
            $table->timestamps();
        });
        $templateArray = [];
        $templateArray[] = ['name' => 'красный', 'price' => 2000];
        $templateArray[] = ['name' => 'синий', 'price' => 3000];
        $templateArray[] = ['name' => 'зелёный', 'price' => 3500];
        $templateArray[] = ['name' => 'жёлтый', 'price' => 4000];

        DB::table('colors')->insert($templateArray);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
