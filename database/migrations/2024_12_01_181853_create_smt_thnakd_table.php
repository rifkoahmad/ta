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
        Schema::create('smt_thnakd', function (Blueprint $table) {
            $table->bigInteger('id_smt_thnakd')->unsigned()->autoIncrement();
            $table->string('kode_smt_thnakd');
            $table->string('nama_smt_thnakd');
            $table->enum('status_smt_thnakd', ['0', '1'])->default('1')->comment('0 = tidak aktif dan 1 = aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smt_thnakd');
    }
};
