@extends('layouts.app')

@section('content')
    <h1>Kategori Surat</h1>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. Klik "Tambah" pada kolom aksi untuk menambahkan
        kategori baru.</p>

    <form class="toolbar" method="get">
        <input type="search" name="q" value="{{ $q }}" placeholder="search">
        <button class="btn">Cari!</button>
        <a class="btn" href="{{ route('categories.create') }}" style="margin-left:auto">[ + ] Tambah Kategori Baru…</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th style="width:220px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->description }}</td>
                    <td class="actions">
                        <a class="btn-blue" href="{{ route('categories.edit', $c) }}">Edit</a>
                        <form action="{{ route('categories.destroy', $c) }}" method="post" class="delete-form"
                            style="display:inline">
                            @csrf @method('DELETE')
                            <button type="button" class="btn-red btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if (!$categories->count())
                <tr>
                    <td colspan="4" style="text-align:center;padding:20px">Tidak ada data.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div style="margin-top:12px">{{ $categories->links() }}</div>
    
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll(".btn-delete").forEach(function(button) {
                    button.addEventListener("click", function(e) {
                        e.preventDefault();
                        let form = this.closest("form");
                        Swal.fire({
                            title: 'Konfirmasi Hapus',
                            text: "Apakah Anda yakin ingin menghapus kategori ini?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
@endsection