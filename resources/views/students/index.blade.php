<x-admin-layout>
    <div class="container">
        <h1 class="mb-3">Daftar Mahasiswa</h1>
        <a href="{{ route('admin.students.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('admin.students.index', ['sort_by' => 'nim', 'sort_type' => request('sort_type') == 'asc' ? 'desc' : 'asc']) }}">
                            NIM
                            @if (request('sort_by') == 'nim')
                                @if (request('sort_type') == 'asc')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('admin.students.index', ['sort_by' => 'nama', 'sort_type' => request('sort_type') == 'asc' ? 'desc' : 'asc']) }}">
                            Nama
                            @if (request('sort_by') == 'nama')
                                @if (request('sort_type') == 'asc')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('admin.students.index', ['sort_by' => 'program_studi', 'sort_type' => request('sort_type') == 'asc' ? 'desc' : 'asc']) }}">
                            Program Studi
                            @if (request('sort_by') == 'program_studi')
                                @if (request('sort_type') == 'asc')
                                    <i class="fas fa-sort-up"></i>
                                @else
                                    <i class="fas fa-sort-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td onclick="window.location.href='{{ route('admin.students.show', $student->id) }}'" style="cursor: pointer;">{{ $student->nim }}</td>
                        <td onclick="window.location.href='{{ route('admin.students.show', $student->id) }}'" style="cursor: pointer;">{{ $student->nama }}</td>
                        <td onclick="window.location.href='{{ route('admin.students.show', $student->id) }}'" style="cursor: pointer;">{{ $student->program_studi }}</td>
                        <td onclick="window.location.href='{{ route('admin.students.show', $student->id) }}'" style="cursor: pointer;">{{ $student->no_hp }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return window.confirm('Apakah anda yakin?');">
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
    </div>
</x-admin-layout>