@extends('layouts.app')

@section('content')
    <h1>Arsip Surat</h1>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. Klik “Lihat” pada kolom aksi untuk menampilkan
        surat.</p>

    <form class="toolbar" method="get">
        <input type="search" name="q" value="{{ $q }}" placeholder="search">
        <button class="btn">Cari!</button>
        <a class="btn" href="{{ route('archives.create') }}" style="margin-left:auto">Arsipkan Surat..</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th style="width:280px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($archives as $a)
                <tr data-row-id="{{ $a->id }}">
                    <td>{{ $a->number }}</td>
                    <td>{{ $a->category->name }}</td>
                    <td>{{ $a->title }}</td>
                    <td>{{ optional($a->archived_at)->format('Y-m-d H:i') }}</td>
                    <td class="actions">
                        <form action="{{ route('archives.destroy', $a) }}" method="post" style="display:inline"
                            class="frm-delete">
                            @csrf @method('DELETE')
                            <button type="button" class="btn-red btn-delete" data-id="{{ $a->id }}">Hapus</button>
                        </form>
                        <a class="btn-yellow" href="{{ route('archives.download', $a) }}">Unduh</a>
                        <a class="btn-blue" href="{{ route('archives.show', $a) }}">Lihat >></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:20px">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:12px">{{ $archives->links() }}</div>

    <dialog id="confirmDlg">
        <div class="dlg">
            <h3 style="text-align:center;margin:0 0 8px">Alert</h3>
            <p style="text-align:center;margin:0 0 10px">Apakah Anda yakin ingin menghapus arsip surat ini?</p>
        </div>
        <div class="footer">
            <button id="btnCancel" class="btn">Batal</button>
            <button id="btnOk" class="btn-red">Ya!</button>
        </div>
    </dialog>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const form = e.target.closest('.frm-delete');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data arsip surat ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Contoh notifikasi sukses setelah redirect
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    </script>
@endpush
