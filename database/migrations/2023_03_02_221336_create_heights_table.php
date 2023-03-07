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
        Schema::create('heights', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price');
            $table->timestamps();
        });
        $templateArray = [];
        $templateArray[] = ['name' => '2000', 'price' => 4000];
        $templateArray[] = ['name' => '2040', 'price' => 4400];
        $templateArray[] = ['name' => '2070', 'price' => 4700];
        $templateArray[] = ['name' => '2100', 'price' => 5000];

        DB::table('heights')->insert($templateArray);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heights');
    }
};
