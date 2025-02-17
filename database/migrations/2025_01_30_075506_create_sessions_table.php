<?php

use Illuminate\Database\Migrations\Migration;  //Migration → Kelas dasar yang digunakan untuk membuat perubahan skema database.
use Illuminate\Database\Schema\Blueprint; //Blueprint → Digunakan untuk mendefinisikan struktur tabel dalam metode up().
use Illuminate\Support\Facades\Schema;  //Schema → Fasad untuk mengelola database (membuat atau menghapus tabel).

return new class extends Migration //Menggunakan anonymous class sebagai migration, yang akan membuat tabel sessions.

{
    /**
     * Run the migrations.
     */
    public function up(): void
    // // up, untuk menerapkan ke databases
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            //Membuat kolom id bertipe string sebagai primary key.
            //ID ini biasanya digunakan untuk mengidentifikasi sesi secara unik.
            $table->foreignId('user_id')->nullable()->index();
            //user id adalah id pengguna yang emiliki sesi ini
            //nullable() → Bisa bernilai NULL (artinya sesi bisa ada tanpa user, misalnya untuk guest).
            //index() → Membantu meningkatkan performa pencarian berdasarkan user_id.
            $table->string('ip_address', 45)->nullable();
            //Menyimpan alamat IP pengguna (maksimal 45 karakter, cukup untuk IPv6).
            //nullable() → Bisa bernilai NULL jika IP tidak tersedia.
            $table->text('user_agent')->nullable();
            //Menyimpan informasi perangkat/browser pengguna.
            $table->longText('payload');
            //Menyimpan data sesi pengguna dalam bentuk teks panjang.
            //Biasanya berisi data yang di-serialize.
            $table->integer('last_activity')->index();
            //Menyimpan timestamp aktivitas terakhir pengguna dalam sesi.
            //ndex() → Mempercepat pencarian sesi berdasarkan aktivitas terakhir.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');// menghapus table sessions jika ada
    }
};
