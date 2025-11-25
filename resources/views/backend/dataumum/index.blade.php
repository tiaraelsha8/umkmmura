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

                    {{-- Tampilkan tombol tambah hanya untuk admin/superadmin --}}
                    @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                        <a href="{{ route('dataumum.create') }}" class="btn btn-primary btn-sm mb-3 mt-3">Tambah</a>
                    @endif

                    {{-- Filter --}}
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="filterKecamatan">Filter Kecamatan</label>
                            <select id="filterKecamatan" class="form-control">
                                <option value="">-- Semua Kecamatan --</option>
                                @foreach ($dataUmums->pluck('kecamatan')->unique() as $kecamatan)
                                    <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="filterKelurahan">Filter Kelurahan</label>
                            <select id="filterKelurahan" class="form-control">
                                <option value="">-- Semua Kelurahan/Desa --</option>
                                @foreach ($dataUmums->pluck('kelurahan')->unique() as $kelurahan)
                                    <option value="{{ $kelurahan }}">{{ $kelurahan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="filterKbli">Filter Kode KBLI</label>
                            <select id="filterKbli" class="form-control">
                                <option value="">-- Semua Kode KBLI --</option>
                                @foreach ($kblis as $kbli)
                                    <option value="{{ $kbli->kode }}">{{ $kbli->kode }} - {{ $kbli->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- FILTER NILAI INVESTASI --}}
                        <div class="col-md-3">
                            <label for="filterInvestasi">Filter Nilai Investasi</label>
                            <input type="text" id="filterInvestasi" class="form-control"
                                placeholder="Masukkan nilai investasi...">
                        </div>
                        {{-- TOMBOL RESET --}}
                        <div class="col-md-3 d-flex align-items-end mt-4">
                            <button id="resetFilters" class="btn btn-secondary w-100 ms-2">
                                Reset Filter
                            </button>
                        </div>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIB</th>
                                <th>Nama Perusahaan</th>
                                <th>Uraian Jenis</th>
                                <th>Alamat</th>
                                <th>Kelurahan/Desa</th>
                                <th>Kecamatan</th>
                                <th>Nilai Investasi</th>
                                <th>Kode KBLI</th>
                                <th>Judul KBLI</th>
                                <th>Izin NIB</th>
                                <th>Izin Usaha</th>
                                @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                                    <th>Aksi</th>
                                @endif
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

                                    @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
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
                                    @endif

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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const $kec = document.getElementById('filterKecamatan');
            const $kel = document.getElementById('filterKelurahan');
            const $kb = document.getElementById('filterKbli');
            const $inv = document.getElementById('filterInvestasi');
            const $rows = Array.from(document.querySelectorAll('#dataTable tbody tr'));

            function normalize(s) {
                return (s || '').toString().trim().toLowerCase();
            }

            function cleanNumber(num) {
                return num.replace(/\./g, "").trim();
            }

            function applyFilter() {
                const selKec = normalize($kec?.value);
                const selKel = normalize($kel?.value);
                const selKb = normalize($kb?.value);
                const selInv = cleanNumber(normalize($inv?.value)); // input user

                $rows.forEach(row => {
                    const cols = row.querySelectorAll('td');
                    if (cols.length === 0) {
                        row.style.display = 'none';
                        return;
                    }

                    const txtKec = normalize(cols[6]?.textContent);
                    const txtKel = normalize(cols[5]?.textContent);
                    const txtKbli = normalize(cols[8]?.textContent);
                    const txtInv = cleanNumber(normalize(cols[7]?.textContent)); // dari tabel

                    let visible = true;

                    if (selKec && !txtKec.includes(selKec)) visible = false;
                    if (selKel && !txtKel.includes(selKel)) visible = false;
                    if (selKb && !txtKbli.includes(selKb)) visible = false;

                    // ⭐ FILTER INVESTASI — HARUS DIAWALI DENGAN ANGKA YANG DICARI
                    if (selInv && txtInv !== selInv) visible = false;

                    row.style.display = visible ? '' : 'none';
                });
            }

            // Event filter select
            [$kec, $kel, $kb].forEach(el => {
                if (!el) return;
                el.addEventListener('change', applyFilter);
                // jika pakai select2, juga jalankan event change dari select2
                if (window.jQuery && $(el).hasClass('select2-hidden-accessible')) {
                    $(el).on('select2:select select2:unselect change', applyFilter);
                }
            });

            // Event untuk filter investasi (ketik)
            if ($inv) {
                $inv.addEventListener('keyup', applyFilter);
                $inv.addEventListener('change', applyFilter);
            }

            // optional: reset filter button (jika ada)
            const resetBtn = document.getElementById('resetFilters');
            if (resetBtn) resetBtn.addEventListener('click', () => {
                if ($kec) $kec.value = '';
                if ($kel) $kel.value = '';
                if ($kb) $kb.value = '';
                if ($inv) $inv.value = '';

                if (window.jQuery) {
                    if ($kec) $($kec).trigger('change');
                    if ($kel) $($kel).trigger('change');
                    if ($kb) $($kb).trigger('change');
                }
                applyFilter();
            });

            // jalankan awal agar terlihat terfilter ketika page load
            applyFilter();
        });
    </script>
@endpush
