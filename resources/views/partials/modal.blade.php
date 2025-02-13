<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{--from action di gunakan untuk mengarahkan data ke palidasi store --}}
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST')
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST')
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="taskListId" name="list_id" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
                <div class="mb-3">
                    {{--mb-3 di buat untuk margin bottom/kasih jarak agar tidak berdekatan--}}
                    <label for="description" class="form-label">Deskripsi :</label>
                    {{-- labael adalah elemen yang di gunakan untuk memberikan informasi tambahan--}}
                    {{-- from-lebel di gunakan untuk menyamakan ukuran infut--}}
                    <input type="text" class="form-control" id="description" name="description"
                    {{-- inpu di gunakan untuk menampilkan form yang akan di isi--}}
                    {{--class"from-control di gunakan menyamakan ukuran--}}
                    {{--id: description / nama description untuk tanda pengenal--}}
                  placeholder="Apakah deskripsi kegiatan anda??🤔">
                  {{--placeholder adalah atribut dalam infut yang memberikan teks petunjuk dalam kolom infut      --}}
                </div>
                <div class="col-md-12 mb-3">
                    <label for="priority" class="form-label">Priority :</label>
                    <select class="form-control" name="priority" id="taskListId" name="list_id" required>
                        {{-- select adalah menu drop down yang mmemungkinkan pengguna memilih satu atau bebrapa opsi--}}
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="low">Low</option>
                         {{-- option adalah elemen yang di gunakan untuk mendevinisikan pilihan atau menu dari drop down select  --}}
                    </select>    
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>