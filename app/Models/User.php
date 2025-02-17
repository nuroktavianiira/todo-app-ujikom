<?php

namespace App\Models;//Menyatakan bahwa model User berada dalam namespace App\Models.

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory; //HasFactory → Digunakan untuk membuat factory agar mudah menghasilkan data pengguna secara otomatis dalam pengujian (seeder).
use Illuminate\Foundation\Auth\User as Authenticatable; //Authenticatable → Kelas dasar untuk model yang dapat digunakan untuk otentikasi pengguna.
use Illuminate\Notifications\Notifiable; //

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    //HasFactory → Digunakan untuk membuat factory data pengguna.
    //Notifiable → Digunakan agar model User bisa menerima notifikasi.
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        //$fillable menentukan kolom mana yang bisa diisi secara massal (Mass Assignment).
        'name',
        'email',
        'password',
        //Ini berarti hanya name, email, dan password yang bisa diisi saat membuat atau memperbarui pengguna menggunakan:
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        //$hidden menyembunyikan atribut tertentu ketika model dikonversi ke array atau JSON.
        //password dan remember_token tidak akan ditampilkan saat model dikembalikan dalam API atau tampilan.

        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', //Konversi kolom email_verified_at menjadi tipe datetime.

            'password' => 'hashed',
        ];
    }
}
