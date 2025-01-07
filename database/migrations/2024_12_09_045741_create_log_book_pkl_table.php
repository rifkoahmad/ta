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
        Schema::create('log_book_pkl', function (Blueprint $table) {
            $table->bigInteger('id_log_book_pkl')->unsigned()->autoIncrement();
            $table->bigInteger('pkl_mahasiswa_id')->unsigned();
            $table->text('kegiatan');
            $table->date('tgl_awal_kegiatan');
            $table->date('tgl_akhir_kegiatan');
            $table->string('dokumen_laporan');
            $table->enum('status', ['1', '2'])->default('1')
                ->comment('1 = Diproses, 2 = Diverifikasi');
            $table->string('komentar')->nullable();
            $table->text('nilai')->nullable();
            $table->timestamps();
        });
        Schema::table('log_book_pkl', function (Blueprint $table) {
            $table->foreign('pkl_mahasiswa_id')->references('id_pkl_mahasiswa')->on('pkl_mahasiswa')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_book_pkl');
    }
};
