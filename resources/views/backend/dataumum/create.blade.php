@extends('backend.layouts.master')

@section('judul')
    Halaman Tambah Data Umum
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
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Umum</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form action="{{ route('dataumum.store') }}" method="POST">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label>NIB</label>
                                <input type="text" class="form-control" name="nib" placeholder="Isikan NIB">
                            </div>
                            @error('nib')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan"
                                    placeholder="Isikan Nama Perusahaan">
                            </div>
                            @error('nama_perusahaan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Uraian Jenis</label>
                                <input type="text" class="form-control" name="uraian_jenis"
                                    placeholder="Isikan Uraian Jenis">
                            </div>
                            @error('uraian_jenis')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="4"></textarea>
                            </div>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Kelurahan / Desa</label>
                                <select id="kelurahan" name="kelurahan" class="form-control select2-kelurahan"> required>
                                    <option value="">-- Pilih Kelurahan / Desa --</option>

                                    <optgroup label="Kecamatan Barito Tuhup Raya">
                                        <option>Desa Batu Tojah</option>
                                        <option>Desa Bumban Tuhup</option>
                                        <option>Desa Cinta Budiman</option>
                                        <option>Desa Dirung Sararong</option>
                                        <option>Desa Hingan Tokung</option>
                                        <option>Desa Kohong</option>
                                        <option>Desa Liang Nyaling</option>
                                        <option>Desa Makunjung</option>
                                        <option>Desa Tumbang Baloi</option>
                                        <option>Desa Tumbang Bauh</option>
                                        <option>Desa Tumbang Masalo</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Laung Tuhup">
                                        <option>Kelurahan Batu Bua I</option>
                                        <option>Kelurahan Muara Laung I</option>
                                        <option>Kelurahan Muara Tuhup</option>
                                        <option>Desa Batu Bua II</option>
                                        <option>Desa Batu Tuhup</option>
                                        <option>Desa Batu Karang</option>
                                        <option>Desa Beras Balange</option>
                                        <option>Desa Beralang</option>
                                        <option>Desa Biha</option>
                                        <option>Desa Dirung Pinang</option>
                                        <option>Desa Dirung Pundu</option>
                                        <option>Desa Kalang Dohong</option>
                                        <option>Desa Lakutan</option>
                                        <option>Desa Muara Laung II</option>
                                        <option>Desa Muara Maruwei I</option>
                                        <option>Desa Muara Maruwei II</option>
                                        <option>Desa Muara Tupuh</option>
                                        <option>Desa Narui</option>
                                        <option>Desa Pelaci</option>
                                        <option>Desa Penda Siron</option>
                                        <option>Desa Tahujan Laung</option>
                                        <option>Desa Tawai Haui</option>
                                        <option>Desa Tumbang Bahan</option>
                                        <option>Desa Tumbang Bana</option>
                                        <option>Desa Tumbang Bondang</option>
                                        <option>Desa Tumbang Tonduk</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Murung">
                                        <option>Kelurahan Puruk Cahu
                                        <option>
                                        <option>Kelurahan Beriwit</option>
                                        <option>Desa Bahitom</option>
                                        <option>Desa Batu Putih</option>
                                        <option>Desa Danau Usung</option>
                                        <option>Desa Dirung</option>
                                        <option>Desa Juking Pajang</option>
                                        <option>Desa Malasan
                                        <option>
                                        <option>Desa Mangkahui</option>
                                        <option>Desa Muara Bumban</option>
                                        <option>Desa Muara Jaan</option>
                                        <option>Desa Muara Sumpoi</option>
                                        <option>Desa Muara Untu</option>
                                        <option>Desa Panu'ut</option>
                                        <option>Desa Penyang</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Permata Intan">
                                        <option>Kelurahan Muara Bakanon</option>
                                        <option>Kelurahan Tumbang Lahung</option>
                                        <option>Desa Baratu</option>
                                        <option>Desa Juking Sopan</option>
                                        <option>Desa Muara Babuat</option>
                                        <option>Desa Pantai Laga</option>
                                        <option>Desa Purnama</option>
                                        <option>Desa Sungai Bakanon</option>
                                        <option>Desa Sungai Batang</option>
                                        <option>Desa Sungai Gula</option>
                                        <option>Desa Sungai Lobang</option>
                                        <option>Desa Tumbang Salio</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Seribu Riam">
                                        <option>Desa Parahau</option>
                                        <option>Desa Muara Joloi I</option>
                                        <option>Desa Muara Joloi II</option>
                                        <option>Desa Tumbang Jojang</option>
                                        <option>Desa Tumbang Naan</option>
                                        <option>Desa Tumbang Takajung</option>
                                        <option>Desa Tumbang Tohan</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Sumber Barito">
                                        <option>Kelurahan Tumbang Kunyi</option>
                                        <option>Desa Batu Makap</option>
                                        <option>Desa Kelapeh Baru</option>
                                        <option>Desa La'as Baru</option>
                                        <option>Desa Olong Liko</option>
                                        <option>Desa Telok Jolo</option>
                                        <option>Desa Tumbang Kunyi</option>
                                        <option>Desa Tumbang Molut</option>
                                        <option>Desa Tumbang Tuan</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Sungai Babuat">
                                        <option>Desa Mirau</option>
                                        <option>Desa Tambelum</option>
                                        <option>Desa Tumbang Apat</option>
                                        <option>Desa Tumbang Bantian</option>
                                        <option>Desa Tumbang Kolon</option>
                                        <option>Desa Tumbang Sa'an</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Tanah Siang">
                                        <option>Kelurahan Saripoi</option>
                                        <option>Desa Belawan</option>
                                        <option>Desa Dirung Bakung</option>
                                        <option>Desa Doan Arung</option>
                                        <option>Desa Cangkang</option>
                                        <option>Desa Kalang Kaluh</option>
                                        <option>Desa Karali</option>
                                        <option>Desa Kolam</option>
                                        <option>Desa Konut</option>
                                        <option>Desa Mahanyan</option>
                                        <option>Desa Mangkalisoi</option>
                                        <option>Desa Mantiat Pari</option>
                                        <option>Desa Muwun</option>
                                        <option>Desa Nono Kliwon</option>
                                        <option>Desa Olung Balo</option>
                                        <option>Desa Olung Dojou</option>
                                        <option>Desa Olung Nango</option>
                                        <option>Desa Olung Siron</option>
                                        <option>Desa Olung Soloi</option>
                                        <option>Desa Olung Ulu</option>
                                        <option>Desa Osom Tompok</option>
                                        <option>Desa Puruk Batu</option>
                                        <option>Desa Saruhung</option>
                                        <option>Desa Sungai Lunuk</option>
                                        <option>Desa Tabulang</option>
                                        <option>Desa Tino Talih</option>
                                        <option>Desa Tokung</option>
                                        <option>Desa Tumbang Salio</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Tanah Siang Selatan">
                                        <option>Desa Datah Kotou</option>
                                        <option>Desa Dirung Lingkin</option>
                                        <option>Desa Olung Hanangan</option>
                                        <option>Desa Olung Muro</option>
                                        <option>Desa Oreng</option>
                                        <option>Puruk Kambang</option>
                                        <option>Desa Tahujan Ontu</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Uut Murung">
                                        <option>Desa Kalasin</option>
                                        <option>Desa Tumbang Olong I</option>
                                        <option>Desa Tumbang Olung II</option>
                                        <option>Desa Tumbang Topus</option>
                                        <option>Desa Tumbang Tujang</option>
                                    </optgroup>

                                </select>
                            </div>
                            @error('kelurahan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="form-control" required>
                                    <option value="">-- Pilih Kecamatan --</option>
                                    <option value="Barito Tuhup Raya">Barito Tuhup Raya</option>
                                    <option value="Laung Tuhup">Laung Tuhup</option>
                                    <option value="Murung">Murung</option>
                                    <option value="Permata Intan">Permata Intan</option>
                                    <option value="Seribu Riam">Seribu Riam</option>
                                    <option value="Sumber Barito">Sumber Barito</option>
                                    <option value="Sungai Babuat">Sungai Babuat</option>
                                    <option value="Tanah Siang">Tanah Siang</option>
                                    <option value="Tanah Siang Selatan">Tanah Siang Selatan</option>
                                    <option value="Uut Murung">Uut Murung</option>
                                </select>
                            </div>
                            @error('kecamatan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Nilai Investasi</label>
                                <input type="number" class="form-control" name="nilai_investasi"
                                    placeholder="Isikan Nilai Investasi">
                            </div>
                            @error('nilai_investasi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            {{-- ========== PILIH KBLI ========== --}}
                            <hr>
                            <h5 class="mb-3">Pilih KBLI</h5>
                            <div class="form-group">
                                <label>KBLI Terkait</label>
                                <select name="kbli_ids[]" id="kbliSelect" class="form-control select2-kbli" multiple>
                                    @foreach ($kblis as $kbli)
                                        <option value="{{ $kbli->id_kbli }}">
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
                                    id="izin_nib">
                                <label class="form-check-label" for="izin_nib">Memiliki Izin NIB</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="izin_usaha" value="1"
                                    id="izin_usaha">
                                <label class="form-check-label" for="izin_usaha">Memiliki Izin Usaha</label>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('dataumum.index') }}" class="btn btn-secondary">Kembali</a>
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

    {{-- option kelurahan/desa --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Cari dan pilih Kelurahan / Desa...",
                allowClear: true
            });
        });
    </script>

    {{-- option kbli dan nama desa/kelurahan --}}
    <script>
        $(document).ready(function() {
            // ✅ hanya aktifkan select2 untuk elemen tertentu
            $('.select2-kelurahan').select2({
                placeholder: 'Pilih Kelurahan / Desa...',
                width: '100%'
            });

            $('.select2-kbli').select2({
                placeholder: 'Cari dan pilih KBLI...',
                width: '100%',
                allowClear: true
            });
            // Mapping Kelurahan -> Kecamatan
            const mapping = {
                // Barito Tuhup Raya
                "Desa Batu Tojah": "Barito Tuhup Raya",
                "Desa Bumban Tuhup": "Barito Tuhup Raya",
                "Desa Cinta Budiman": "Barito Tuhup Raya",
                "Desa Dirung Sararong": "Barito Tuhup Raya",
                "Desa Hingan Tokung": "Barito Tuhup Raya",
                "Desa Kohong": "Barito Tuhup Raya",
                "Desa Liang Nyaling": "Barito Tuhup Raya",
                "Desa Makunjung": "Barito Tuhup Raya",
                "Desa Tumbang Baloi": "Barito Tuhup Raya",
                "Desa Tumbang Bauh": "Barito Tuhup Raya",
                "Desa Tumbang Masalo": "Barito Tuhup Raya",

                // Laung Tuhup
                "Kelurahan Batu Bua I": "Laung Tuhup",
                "Kelurahan Muara Laung I": "Laung Tuhup",
                "Kelurahan Muara Tuhup": "Laung Tuhup",
                "Desa Batu Bua II": "Laung Tuhup",
                "Desa Batu Tuhup": "Laung Tuhup",
                "Desa Batu Karang": "Laung Tuhup",
                "Desa Beras Balange": "Laung Tuhup",
                "Desa Beralang": "Laung Tuhup",
                "Desa Biha": "Laung Tuhup",
                "Desa Dirung Pinang": "Laung Tuhup",
                "Desa Dirung Pundu": "Laung Tuhup",
                "Desa Kalang Dohong": "Laung Tuhup",
                "Desa Lakutan": "Laung Tuhup",
                "Desa Muara Laung II": "Laung Tuhup",
                "Desa Muara Maruwei I": "Laung Tuhup",
                "Desa Muara Maruwei II": "Laung Tuhup",
                "Desa Muara Tupuh": "Laung Tuhup",
                "Desa Narui": "Laung Tuhup",
                "Desa Pelaci": "Laung Tuhup",
                "Desa Penda Siron": "Laung Tuhup",
                "Desa Tahujang Laung": "Laung Tuhup",
                "Desa Tawai Haui": "Laung Tuhup",
                "Desa Tumbang Bahan": "Laung Tuhup",
                "Desa Tumbang Bana": "Laung Tuhup",
                "Desa Tumbang Bondang": "Laung Tuhup",
                "Desa Tumbang Tonduk": "Laung Tuhup",

                // Murung
                "Kelurahan Puruk Cahu": "Murung",
                "Kelurahan Beriwit": "Murung",
                "Desa Bahitom": "Murung",
                "Desa Batu Putih": "Murung",
                "Desa Danau Usung": "Murung",
                "Desa Dirung": "Murung",
                "Desa Malasan": "Murung",
                "Desa Mangkahui": "Murung",
                "Desa Muara Bumban": "Murung",
                "Desa Muara Jaan": "Murung",
                "Desa Muara Untu": "Murung",
                "Desa Panu'ut": "Murung",
                "Desa Penyang": "Murung",

                // Permata Intan
                "Kelurahan Muara Bakanon": "Permata Intan",
                "Kelurahan Tumbang Lahung": "Permata Intan",
                "Desa Baratu": "Permata Intan",
                "Desa Juking Sopan": "Permata Intan",
                "Desa Muara Babuat": "Permata Intan",
                "Desa Pantai Laga": "Permata Intan",
                "Desa Purnama": "Permata Intan",
                "Desa Sungai Bakanon": "Permata Intan",
                "Desa Sungai Batang": "Permata Intan",
                "Desa Sungai Gula": "Permata Intan",
                "Desa Sungai Lobang": "Permata Intan",
                "Desa Tumbang Salio": "Permata Intan",

                // Seribu Riam
                "Desa Parahau": "Seribu Riam",
                "Desa Muara Joloi I": "Seribu Riam",
                "Desa Muara Joloi II": "Seribu Riam",
                "Desa Tumbang Jojang": "Seribu Riam",
                "Desa Tumbang Naan": "Seribu Riam",
                "Desa Tumbang Takajung": "Seribu Riam",
                "Desa Tumbang Tohan": "Seribu Riam",

                // Sumber Barito
                "Kelurahan Tumbang Kunyi": "Sumber Barito",
                "Desa Batu Makap": "Sumber Barito",
                "Desa Kelapeh Baru": "Sumber Barito",
                "Desa La'as Baru": "Sumber Barito",
                "Desa Olong Liko": "Sumber Barito",
                "Desa Telok Jolo": "Sumber Barito",
                "Desa Tumbang Kunyi": "Sumber Barito",
                "Desa Tumbang Molut": "Sumber Barito",
                "Desa Tumbang Tuan": "Sumber Barito",

                // Sungai Babuat
                "Desa Mirau": "Sungai Babuat",
                "Desa Tambelum": "Sungai Babuat",
                "Desa Tumbang Apat": "Sungai Babuat",
                "Desa Tumbang Bantian": "Sungai Babuat",
                "Desa Tumbang Kolon": "Sungai Babuat",
                "Desa Tumbang Saan": "Sungai Babuat",

                // Tanah Siang
                "Desa Saripoi": "Tanah Siang",
                "Desa Belawan": "Tanah Siang",
                "Desa Dirung Bakung": "Tanah Siang",
                "Desa Doan Arung": "Tanah Siang",
                "Desa Cangkang": "Tanah Siang",
                "Desa Kalang Kaluh": "Tanah Siang",
                "Desa Karali": "Tanah Siang",
                "Desa Kolam": "Tanah Siang",
                "Desa Konut": "Tanah Siang",
                "Desa Mahanyan": "Tanah Siang",
                "Desa Mangkalisoi": "Tanah Siang",
                "Desa Mantiat Pari": "Tanah Siang",
                "Desa Muwun": "Tanah Siang",
                "Desa Nono Kliwon": "Tanah Siang",
                "Desa Olung Balo": "Tanah Siang",
                "Desa Olung Dojou": "Tanah Siang",
                "Desa Olung Nango": "Tanah Siang",
                "Desa Olung Siron": "Tanah Siang",
                "Desa Olung Soloi": "Tanah Siang",
                "Desa Olung Ulu": "Tanah Siang",
                "Desa Osom Tompok": "Tanah Siang",
                "Desa Puruk Batu": "Tanah Siang",
                "Desa Saruhung": "Tanah Siang",
                "Desa Sungai Lunuk": "Tanah Siang",
                "Desa Tabulang": "Tanah Siang",
                "Desa Tino Talih": "Tanah Siang",
                "Desa Tokung": "Tanah Siang",
                "Desa Tumbang Salio": "Tanah Siang",

                // Tanah Siang Selatan
                "Desa Datah Kotou": "Tanah Siang Selatan",
                "Desa Dirung Lingkin": "Tanah Siang Selatan",
                "Desa Olung Hanangan": "Tanah Siang Selatan",
                "Desa Olung Muro": "Tanah Siang Selatan",
                "Desa Oreng": "Tanah Siang Selatan",
                "Puruk Kambang": "Tanah Siang Selatan",
                "Desa Tahujan Ontu": "Tanah Siang Selatan",

                // Uut Murung
                "Desa Kalasin": "Uut Murung",
                "Desa Tumbang Olong I": "Uut Murung",
                "Desa Tumbang Olung II": "Uut Murung",
                "Desa Tumbang Topus": "Uut Murung",
                "Desa Tumbang Tujang": "Uut Murung"
            };

            $('#kelurahan').on('change', function() {
                const kel = $(this).val();
                if (mapping[kel]) {
                    $('#kecamatan').val(mapping[kel]);
                } else {
                    $('#kecamatan').val('');
                }
            });

            // === TAMPILKAN LIST KBLI TERPILIH ===
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
