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
       
        Schema::create('laporans', function (Blueprint $table) {

            $table->id();
            $table->foreignId('santri_id');
            $table->string('judul');
            $table->text('isi');
            $table->enum('status', [
                'baru',
                'diproses',
                'selesai'
            ])->default('baru');

            $table->timestamps();

});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
