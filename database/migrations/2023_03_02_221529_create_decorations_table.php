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
        Schema::create('decorations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price');
            $table->timestamps();
        });

        $templateArray = [];
        $templateArray[] = ['name' => 'накладка на порог', 'price' => 1000];
        $templateArray[] = ['name' => 'грекон', 'price' => 1200];


        DB::table('decorations')->insert($templateArray);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decorations');
    }
};
