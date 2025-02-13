<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    // Method untuk menyimpan daftar tugas baru
    public function store(Request $request) {
        // Validasi input dari pengguna
        $request->validate([
            'name' => 'required|max:100' // Nama wajib diisi dan maksimal 100 karakter
        ]);

        // Membuat daftar tugas baru di database
        TaskList::create([
            'name' => $request->name
        ]);

        return redirect()->back(); // Kembali ke halaman sebelumnya setelah menyimpan
    }

    // Method untuk menghapus daftar tugas berdasarkan ID
    public function destroy($id) {
        TaskList::findOrFail($id)->delete(); // Mencari daftar tugas berdasarkan ID dan menghapusnya

        return redirect()->back(); // Kembali ke halaman sebelumnya setelah menghapus
    }
}
