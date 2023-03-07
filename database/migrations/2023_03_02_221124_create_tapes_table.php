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
        Schema::create('tapes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price');
            $table->timestamps();
        });
        $templateArray = [];
        $templateArray[] = ['name' => 'красная', 'price' => 1000];
        $templateArray[] = ['name' => 'синяя', 'price' => 1200];
        $templateArray[] = ['name' => 'зелёная', 'price' => 1400];
        $templateArray[] = ['name' => 'жёлтая', 'price' => 1500];

        DB::table('tapes')->insert($templateArray);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tapes');
    }
};
