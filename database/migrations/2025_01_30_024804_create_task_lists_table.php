<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
//Menggunakan anonymous class untuk mendeklarasikan migration tanpa harus memberi nama kelasnya.
{
    /**
     * Run the migrations.
     */
    public function up(): void
    // up, untuk menerapkan ke databases
    {
        Schema::create('task_lists', function (Blueprint $table)
         //scema::create adalah metode yang di gunakan untuk membuat table baru di database
        //tasklist:adalah nama table yang akan di buat
        //function blue print table:di gunakan untuk medefinisikan kolom kolom dalam table tasklis
        {
            $table->id();
             //untuk mengisi table id yang di mana dalam sebuah form id wajib ada
            $table->string('name')->unique();
            //untuk mencetak duplikan aplikasi dengan enambahkan unique()
            //Membuat kolom name dengan tipe string dan unik (tidak boleh ada data yang sama).
            $table->timestamps();
               //untuk menentukan waktu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    // down, Metode ini digunakan jika ingin membatalkan migration (php artisan migrate:rollback).
      // untuk mengembalikan perubahan yang ada bertujuan unutk membatalkan atau menghapus perubahan yang telah di lakukan oleh metode up
    {
        Schema::dropIfExists('task_lists');
         //di gunakan untuk menghapus table task_lists di database otomatis semua
    }
};
