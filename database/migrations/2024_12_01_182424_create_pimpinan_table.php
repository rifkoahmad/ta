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
        Schema::create('pimpinan', function (Blueprint $table) {
            $table->bigInteger('id_pimpinan')->unsigned()->autoIncrement();
            $table->bigInteger('jabatan_pimpinan_id')->unsigned();
            $table->bigInteger('dosen_id')->unsigned();
            // $table->bigInteger('prodi_id')->unsigned();
            $table->bigInteger('jurusan_id')->unsigned();
            $table->string('periode');
            $table->enum('status_pimpinan', ['0', '1'])->default('1');
            $table->timestamps();
        });

        Schema::table('pimpinan', function (Blueprint $table) {
            $table->foreign('jabatan_pimpinan_id')->references('id_jabatan_pimpinan')->on('jabatan_pimpinan')
                ->onUpdate('cascade');
            $table->foreign('dosen_id')->references('id_dosen')->on('dosen')
                ->onUpdate('cascade');
            $table->foreign('jurusan_id')->references('id_jurusan')->on('jurusan')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pimpinan');
    }
};
