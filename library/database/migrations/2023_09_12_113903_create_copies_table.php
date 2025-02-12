<?php

use App\Models\Copy;
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
        Schema::create('copies', function (Blueprint $table) {
            $table->id('copy_id');
            // 0: puha, 1: kemény kötésű
            $table->boolean('hardcovered')->default(0);
            $table->year('publication');
            // 0:könyvtárban van 1:felhasználónál 2:selejtes
            $table->integer('status')->default(0);
            $table->foreignId('book_id')->references('book_id')->on('books');
            $table->timestamps();
        });

        Copy::create([
            'book_id' => 2,
            'publication' => 2023
        ]);

        Copy::create([
            'book_id' => 1,
            'publication' => 2010,
            'hardcovered'=> 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copies');
    }
};
