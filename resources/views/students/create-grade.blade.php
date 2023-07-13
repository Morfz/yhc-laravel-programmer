<x-admin-layout>
    <section class="container">
        <h1 class="mb-3">Tambah Nilai</h1>
        
        <form action="{{ route('admin.students.storeGrade', $student->id) }}" method="POST" onsubmit="return window.confirm('Apakah anda yakin?');">
            @csrf
        
            <div class="form-group">
                <label for="mata_kuliah">Mata Kuliah</label>
                <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" required>
            </div>
    
            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" class="form-control" id="nilai" name="nilai" required>
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </section>
</x-admin-layout>