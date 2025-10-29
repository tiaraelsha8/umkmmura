@extends('backend.layouts.master')

@section('judul')
    Halaman Edit Data Umum
@endsection

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
        <h1 class="h3 mb-2 text-gray-800">Edit Data Umum</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form action="{{ route('dataumum.update', $dataUmum->id_umum) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label>NIB</label>
                                <input type="text" class="form-control" name="nib" value="{{ $dataUmum->nib }}">
                            </div>
                            @error('nib')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan"
                                    value="{{ $dataUmum->nama_perusahaan }}">
                            </div>
                            @error('nama_perusahaan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Uraian Jenis</label>
                                <input type="text" class="form-control" name="uraian_jenis"
                                    value="{{ $dataUmum->uraian_jenis }}">
                            </div>
                            @error('uraian_jenis')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="4">{{ $dataUmum->alamat }}</textarea>
                            </div>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan"
                                    value="{{ $dataUmum->kelurahan }}">
                            </div>
                            @error('kelurahan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan"
                                    value="{{ $dataUmum->kecamatan }}">
                            </div>
                            @error('kecamatan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Nilai Investasi</label>
                                <input type="number" class="form-control" name="nilai_investasi"
                                    value="{{ $dataUmum->nilai_investasi }}">
                            </div>
                            @error('nilai_investasi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- ========== PILIH KBLI ========== --}}
                            <hr>
                            <h5 class="mb-3">Pilih KBLI</h5>
                            <div class="form-group">
                                <label>KBLI Terkait</label>
                                <select name="kbli_ids[]" id="kbliSelect" class="form-control" multiple>
                                    @foreach ($kblis as $kbli)
                                        <option value="{{ $kbli->id_kbli }}"
                                            {{ in_array($kbli->id_kbli, $dataUmum->kblis->pluck('id_kbli')->toArray()) ? 'selected' : '' }}>
                                            {{ $kbli->kode }} - {{ $kbli->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kbli_ids')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div id="selectedKblis" class="mt-3"></div>
                            </div>

                            {{-- ========== STATUS IZIN ========== --}}
                            <hr>
                            <h5 class="mb-3">Status Izin Perusahaan</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="izin_nib" value="1"
                                    id="izin_nib" {{ $dataUmum->izin_nib ? 'checked' : '' }}>
                                <label class="form-check-label" for="izin_nib">Memiliki Izin NIB</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="izin_usaha" value="1"
                                    id="izin_usaha" {{ $dataUmum->izin_usaha ? 'checked' : '' }}>
                                <label class="form-check-label" for="izin_usaha">Memiliki Izin Usaha</label>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('dataumum.index') }}" class="btn btn-default">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    {{-- Include jQuery & Select2 --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // aktifkan select2
            $('#kbliSelect').select2({
                placeholder: "Cari dan pilih KBLI...",
                allowClear: true,
                width: '100%'
            });

            // tampilkan list yang dipilih di bawah select
            $('#kbliSelect').on('change', function() {
                let selected = $(this).find('option:selected');
                let list = '<ul class="list-group">';
                selected.each(function() {
                    list += `<li class="list-group-item py-1">${$(this).text()}</li>`;
                });
                list += '</ul>';
                $('#selectedKblis').html(list);
            });
        });
    </script>
@endpush
