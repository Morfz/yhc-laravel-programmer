<x-admin-layout>
    <section class="container">
        <h1 class="mb-3">Detail Mahasiswa</h1>
    
        <table class="table">
            <tbody>
                <tr>
                    <th>NIM</th>
                    <td>{{ $student->nim }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $student->nama }}</td>
                </tr>
                <tr>
                    <th>Program Studi</th>
                    <td>{{ $student->program_studi }}</td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td>{{ $student->no_hp }}</td>
                </tr>
            </tbody>
        </table>
    
        <h2 class="mb-3">Nilai</h2>
    
        <a href="{{ route('admin.students.createGrade', $student->id) }}" class="btn btn-primary mb-3">Tambah Nilai</a>
    
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('admin.students.show', [$student->id, 'sort_by' => 'mata_kuliah', 'sort_type' => request('sort_type') == 'asc' ? 'desc' : 'asc']) }}">
                            Mata Kuliah
                            @if (request('sort_by') == 'mata_kuliah')
                                @if (request('sort_type') == 'asc')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('admin.students.show', [$student->id, 'sort_by' => 'nilai', 'sort_type' => request('sort_type') == 'asc' ? 'desc' : 'asc']) }}">
                            Nilai
                            @if (request('sort_by') == 'nilai')
                                @if (request('sort_type') == 'asc')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('admin.students.show', [$student->id, 'sort_by' => 'grade', 'sort_type' => request('sort_type') == 'asc' ? 'desc' : 'asc']) }}">
                            Grade
                            @if (request('sort_by') == 'grade')
                                @if (request('sort_type') == 'asc')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $grade->mata_kuliah }}</td>
                        <td>{{ $grade->nilai }}</td>
                        <td>{{ $grade->grade }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.students.editGrade', [$student->id, $grade->id]) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                <form action="{{ route('admin.students.destroyGrade', [$student->id, $grade->id]) }}" method="POST" onsubmit="return window.confirm('Apakah anda yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    </section>
</x-admin-layout>