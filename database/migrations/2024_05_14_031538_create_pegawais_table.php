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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('jabatan_id')->unsigned();
            $table->bigInteger('unitkerja_id')->unsigned();
            $table->string('nama');
            $table->string('jeniskelamin');
            $table->string('agama');
            $table->string('statuskeluarga');
            $table->string('golongandarah');
            $table->bigInteger('nip');
            $table->integer('usia')->nullable();
            $table->integer('masakerja');
            $table->string('alamat');
            $table->string('ttl');
            $table->date('tmt');
            $table->string('foto')->nullable(); // Kolom untuk menyimpan path foto
            $table->timestamps();           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
