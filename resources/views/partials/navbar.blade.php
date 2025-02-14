<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    {{-- nav class di gunakan untuk membungkus tampilan navbar --}}
    {{-- navbar-expand-ig di gunakan untuk membuat tampilan navbar menjadi responsip --}}
    {{-- bg-primary di gunakan untuk mewarnai beground navbar menjadi berwarna biru --}}
    {{-- navbar-dark di gunakan untuk membuat teks navbar berwarna hitam --}}
    {{-- fixed-top di gunakan untuk untuk membut tataletak navbar menjadi tetap di atas --}}
    <a class="navbar-brand fw-bolder" href="#">{{ config('app.name') }}</a>

    <div class="container d-flex justify-content-end">
        <form class="d-flex" action="{{ route('search') }}" method="GET" role="search">
            <!-- Input pencarian dengan id "search-input" -->
            <input id="search-input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <!-- Tombol untuk melakukan pencarian atau refresh hasil pencarian
             Formulir dengan input untuk mencari data, yang memungkinkan pengguna untuk mencari dan kemudian menampilkan hasil pencarian. Tombol bertuliskan "Refresh" digunakan untuk menyegarkan pencarian.-->
            <button class="btn btn-outline-black" type="submit">Refresh</button>
        </form>
        

    </div>
</nav>
