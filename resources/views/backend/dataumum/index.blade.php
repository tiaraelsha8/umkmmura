@extends('backend.layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Umum</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('dataumum.create') }}" class="btn btn-primary btn-sm mb-3 mt-3">Tambah</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIB</th>
                                <th>Nama Perusahaan</th>
                                <th>Uraian Jenis</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Nilai Investasi</th>
                                <th>Kode KBLI</th>
                                <th>Judul KBLI</th>
                                <th>Izin NIB</th>
                                <th>Izin Usaha</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataUmums as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->nib }}</td>
                                    <td>{{ $value->nama_perusahaan }}</td>
                                    <td>{{ $value->uraian_jenis }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->kelurahan }}</td>
                                    <td>{{ $value->kecamatan }}</td>
                                    <td>{{ number_format($value->nilai_investasi ?? 0, 0, ',', '.') }}</td>

                                    {{-- Data KBLI --}}
                                    <td>{{ $value->kblis->pluck('kode')->implode(', ') }}</td>
                                    <td>{{ $value->kblis->pluck('nama')->implode(', ') }}</td>

                                    {{-- Status izin dari pivot --}}
                                    <td class="text-center">
                                        {!! $value->izin_nib == 1 ? '✅' : '❌' !!}
                                    </td>
                                    <td class="text-center">
                                        {!! $value->izin_usaha == 1 ? '✅' : '❌' !!}
                                    </td>

                                    <td>
                                        <form action="{{ route('dataumum.destroy', $value->id_umum) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('dataumum.edit', $value->id_umum) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center text-muted">Belum ada data umum</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
