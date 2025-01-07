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
        Schema::create('pkl_nilai', function (Blueprint $table) {
            $table->bigInteger('id_pkl_nilai')->unsigned()->autoIncrement();
            $table->bigInteger('pkl_mahasiswa_id')->unsigned();
            $table->bigInteger('dosen_id')->unsigned();
            $table->text('nilai');
            $table->enum('sebagai', ['pembimbing', 'penguji']);
            $table->timestamps();
        });
        Schema::table('pkl_nilai', function (Blueprint $table) {
            $table->foreign('pkl_mahasiswa_id')->references('id_pkl_mahasiswa')->on('pkl_mahasiswa')
                ->onUpdate('cascade');
            $table->foreign('dosen_id')->references('id_dosen')->on('dosen')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkl_nilai');
    }
};
