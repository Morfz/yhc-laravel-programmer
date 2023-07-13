<x-admin-layout>
    <section class="container">
        <h1 class="mb-3">Tambah Mahasiswa</h1>
        
        <form action="{{ route('admin.students.store') }}" method="POST" onsubmit="return window.confirm('Apakah anda yakin?');">
            @csrf
        
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
        
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
        
            <div class="form-group">
                <label for="program_studi">Program Studi</label>
                <input type="text" class="form-control" id="program_studi" name="program_studi" required>
            </div>
        
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </section>
</x-admin-layout>