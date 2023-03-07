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
        Schema::create('widths', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price');
            $table->timestamps();
        });

        $templateArray = [];
        $templateArray[] = ['name' => '850', 'price' => 3000];
        $templateArray[] = ['name' => '880', 'price' => 4000];
        $templateArray[] = ['name' => '920', 'price' => 5000];
        $templateArray[] = ['name' => '970', 'price' => 6000];

        DB::table('widths')->insert($templateArray);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('widths');
    }
};
