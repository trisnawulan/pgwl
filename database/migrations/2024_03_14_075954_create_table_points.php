<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  //membuat tabel baru di dalam database
    {
        Schema::create('table_points', function (Blueprint $table) { //membuat sebuah tabel baru di dalam database. Nama tabelnya adalah 'table_points'
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->geometry('geom', 4326);
            $table->timestamps(); //menambahkan dua kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_points');
    }
};
