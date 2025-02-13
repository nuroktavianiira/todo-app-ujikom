<?php
// TaskController digunakan untuk menangani operasi CRUD (Create, Read, Update, Delete) pada tugas 
namespace App\Http\Controllers;

use App\Models\Task;
//use App\Models\Task; → Mengimpor model Task, yang merepresentasikan tabel tasks dalam database.
use App\Models\TaskList;
//use App\Models\TaskList; → Mengimpor model TaskList, yang merepresentasikan daftar tugas.
use Illuminate\Http\Request; 
//use Illuminate\Http\Request; → Mengimpor kelas Request untuk menangani input dari pengguna.

class TaskController extends Controller
{
    // Menampilkan daftar tugas di halaman utama
    public function index() {
        $data = [
            'title' => 'Home',
            'lists' => TaskList::all(), // Mengambil semua daftar tugas dari database
            'tasks' => Task::orderBy('created_at', 'desc')->get(), // Mengambil semua tugas dan mengurutkan berdasarkan waktu pembuatan (terbaru ke terlama)
            'priorities' => Task::PRIORITIES // Mengambil daftar prioritas tugas
        ];

        return view('pages.home', $data); // Menampilkan halaman home dengan data yang diambil
    }

    // Menyimpan tugas baru ke dalam database
    public function store(Request $request) {
        // Validasi data yang dikirim oleh pengguna
        $request->validate([
            'name' => 'required|max:100', // Nama tugas wajib diisi dan maksimal 100 karakter
            'description' => 'max:255', // Deskripsi maksimal 255 karakter
            'priority' => 'required|in:low,medium,high', // Prioritas harus dipilih dari opsi yang tersedia
            'list_id' => 'required' // List ID wajib diisi
        ]);

        // Membuat tugas baru di database
        Task::create([
            'name' => $request->name,
            'description' => $request->description, 
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);

        return redirect()->back(); // Kembali ke halaman sebelumnya setelah menyimpan
    }

    // Menandai tugas sebagai selesai
    public function complete($id) {
        // Mencari tugas berdasarkan ID dan menandai sebagai selesai
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

    // Menghapus tugas berdasarkan ID
    public function destroy($id) {
        Task::findOrFail($id)->delete(); // Menghapus tugas dari database
        return redirect()->route('home'); // Kembali ke halaman utama
    }

    // Menampilkan detail tugas berdasarkan ID
    public function show($id) {
        $data = [
            'title' => 'Task',
            'lists' => TaskList::all(), // Mengambil semua daftar tugas
            'task' => Task::findOrFail($id), // Mengambil tugas berdasarkan ID
        ];

        return view('pages.details', $data); // Menampilkan halaman detail tugas
    }

    // Mengubah daftar tugas dari suatu tugas
    public function changeList(Request $request, Task $task) {
        $request->validate([
            'list_id' => 'required|exists:task_lists,id', // Validasi bahwa list_id harus ada di tabel task_lists
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id // Memperbarui list tugas
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!'); // Pesan sukses
    }

    // Memperbarui informasi tugas yang sudah ada
    public function update(Request $request, Task $task) {
        $request->validate([
            'list_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high'
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!'); // Pesan sukses setelah update
    }
}
//Kode dalam TaskController ini menangani semua fitur utama dalam manajemen tugas 
//Menampilkan daftar tugas (index)
//Membuat tugas baru (store()
//Menandai tugas selesai (complete()
//Menghapus tugas (destroy()
//Menampilkan detail tugas (show()
//Memindahkan tugas ke daftar lain (changeList()
//Memperbarui tugas yang sudah ada (update()