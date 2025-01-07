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
        Schema::create('dosen', function (Blueprint $table) {
            // $table->bigInteger('id_dosen')->primary()->unsigned();
            $table->bigInteger('id_dosen')->unsigned()->autoIncrement();
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->bigInteger('prodi_id')->unsigned();
            $table->bigInteger('golongan_id')->unsigned();
            $table->string('nama_dosen');
            $table->string('nidn_dosen');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->enum('status_dosen', ['0', '1'])->default('1');
            $table->timestamps();
        });

        Schema::table('dosen', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade');
            $table->foreign('prodi_id')->references('id_prodi')->on('prodi')
                ->onUpdate('cascade');
            $table->foreign('golongan_id')->references('id_golongan')->on('golongan')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
