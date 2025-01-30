<?php

namespace App\Http\Controllers;
//mengambil data di app/model/task
use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        //untuk mengambil data fariable yang ada di dalam folder models/task
        $data = [
            'title' => 'Home',
            //membuat judul untuk tampilan home 
            'lists' => TaskList::all(),
             //lists untuk mengambil semua taskList yang da di folder models/tasklist
            'tasks' => Task::orderBy
            ('created_at', 'desc')->get(),
            //orderby adalah mengurutkan dari yang terbesar ke yang terkecil 
            'priorities' => Task::PRIORITIES
            //untuk mengambil nilai priorities/kondisi dari yang ada di app/model/task
        ];

        return view('pages.home', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'list_id' => 'required'
        ]);

        Task::create([
            'name' => $request->name,
            'list_id' => $request->list_id
        ]);


        return redirect()->back();
    }

    public function complete($id) {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    public function destroy($id) {
        Task::findOrFail($id)->delete();

        return redirect()->back();
    }
}
