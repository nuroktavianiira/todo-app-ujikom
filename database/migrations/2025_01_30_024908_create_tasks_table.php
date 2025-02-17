<?php

use Illuminate\Database\Migrations\Migration;   
// di gunakan untuk mengimport kelas migration yang merupakan kelas dasar dalam laravel
use Illuminate\Database\Schema\Blueprint;
// di gunakan untuk menginfort kelas blueprint (untuk mengambil kolom dan table di database)
use Illuminate\Support\Facades\Schema;
//di gunakan untuk menginport scema facde di laravel (untuk create, menghapus,update)
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    // untuk menerapkan merubah ke databases//
    {
        Schema::create('tasks', function (Blueprint $table)
        //scema::create adalah metode yang di gunakan untuk membuat table baru di database
        //tasklist:adalah nama table yang akan di buat
        //function blue print table:di gunakan untuk medefinisikan kolom kolom dalam table tasklis
         {
            $table->id();
            //untuk mengisi table id yang di mana dalam sebuah form id wajib ada
            $table->string('name');
            //untuk mencegah duplikasi dengan menambahkan unique
            $table->string('description')->nullable();
            // descrition di gunakan untuk membuat deskripsi pada suatu task, pungsinya untuk membuah task lebih sepesipik
            // nullable: opsional, membuat deskripsi lebih sepesipik   
            $table->boolean('is_completed')->default(false);
            //
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            // menambahkan data 
            $table->timestamps();
             //untuk menentukan waktu

            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    // untuk mengembalikan perubahan yang ada bertujuan unutk membatalkan atau menghapus perubahan yang telah di lakukan oleh metode up
   
    {
        Schema::dropIfExists('tasks');
         //di gunakan untuk menghapus table task di database otomatis semua
       
    }
};
