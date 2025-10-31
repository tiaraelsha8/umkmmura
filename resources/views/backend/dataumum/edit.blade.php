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
                                <label>Kelurahan / Desa</label>
                                <select id="kelurahan" name="kelurahan" class="form-control select2-kelurahan"> required>
                                    <option value="">-- Pilih Kelurahan / Desa --</option>

                                    <optgroup label="Kecamatan Barito Tuhup Raya">
                                        <option value="Desa Batu Tojah"
                                            {{ $dataUmum->kelurahan == 'Desa Batu Tojah' ? 'selected' : '' }}>Desa Batu
                                            Tojah</option>
                                        <option value="Desa Bumban Tuhup"
                                            {{ $dataUmum->kelurahan == 'Desa Bumban Tuhup' ? 'selected' : '' }}>Desa Bumban
                                            Tuhup</option>
                                        <option value="Desa Cinta Budiman"
                                            {{ $dataUmum->kelurahan == 'Desa Cinta Budiman' ? 'selected' : '' }}>Desa Cinta
                                            Budiman</option>
                                        <option value="Desa Dirung Sararong"
                                            {{ $dataUmum->kelurahan == 'Desa Dirung Sararong' ? 'selected' : '' }}>Desa
                                            Dirung Sararong</option>
                                        <option value="Desa Hingan Tokung"
                                            {{ $dataUmum->kelurahan == 'Desa Hingan Tokung' ? 'selected' : '' }}>Desa
                                            Hingan Tokung</option>
                                        <option value="Desa Kohong"
                                            {{ $dataUmum->kelurahan == 'Desa Kohong' ? 'selected' : '' }}>Desa Kohong
                                        </option>
                                        <option value="Desa Liang Nyaling"
                                            {{ $dataUmum->kelurahan == 'Desa Liang Nyaling' ? 'selected' : '' }}>Desa Liang
                                            Nyaling</option>
                                        <option value="Desa Makunjung"
                                            {{ $dataUmum->kelurahan == 'Desa Makunjung' ? 'selected' : '' }}>Desa Makunjung
                                        </option>
                                        <option value="Desa Tumbang Baloi"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Baloi' ? 'selected' : '' }}>Desa
                                            Tumbang Baloi</option>
                                        <option value="Desa Tumbang Bauh"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Bauh' ? 'selected' : '' }}>Desa
                                            Tumbang Bauh</option>
                                        <option value="Desa Tumbang Masalo"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Masalo' ? 'selected' : '' }}>Desa
                                            Tumbang Masalo</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Laung Tuhup">
                                        <option value="Kelurahan Batu Bua I"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Batu Bua I' ? 'selected' : '' }}>
                                            Kelurahan Batu Bua I</option>
                                        <option value="Kelurahan Muara Laung I"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Muara Laung I' ? 'selected' : '' }}>
                                            Kelurahan Muara Laung I</option>
                                        <option value="Kelurahan Muara Tuhup"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Muara Tuhup' ? 'selected' : '' }}>
                                            Kelurahan Muara Tuhup</option>
                                        <option value="Desa Batu Bua II"
                                            {{ $dataUmum->kelurahan == 'Desa Batu Bua II' ? 'selected' : '' }}>Desa Batu
                                            Bua II</option>
                                        <option value="Desa Batu Tuhup"
                                            {{ $dataUmum->kelurahan == 'Desa Batu Tuhup' ? 'selected' : '' }}>Desa Batu
                                            Tuhup</option>
                                        <option value="Desa Batu Karang"
                                            {{ $dataUmum->kelurahan == 'Desa Batu Karang' ? 'selected' : '' }}>Desa Batu
                                            Karang</option>
                                        <option value="Desa Beras Balange"
                                            {{ $dataUmum->kelurahan == 'Desa Beras Balange' ? 'selected' : '' }}>Desa Beras
                                            Balange</option>
                                        <option value="Desa Beralang"
                                            {{ $dataUmum->kelurahan == 'Desa Beralang' ? 'selected' : '' }}>Desa Beralang
                                        </option>
                                        <option value="Desa Biha"
                                            {{ $dataUmum->kelurahan == 'Desa Biha' ? 'selected' : '' }}>Desa Biha</option>
                                        <option value="Desa Dirung Pinang"
                                            {{ $dataUmum->kelurahan == 'Desa Dirung Pinang' ? 'selected' : '' }}>Desa
                                            Dirung Pinang</option>
                                        <option value="Desa Dirung Pundu"
                                            {{ $dataUmum->kelurahan == 'Desa Dirung Pundu' ? 'selected' : '' }}>Desa Dirung
                                            Pundu</option>
                                        <option value="Desa Kalang Dohong"
                                            {{ $dataUmum->kelurahan == 'Desa Kalang Dohong' ? 'selected' : '' }}>Desa
                                            Kalang Dohong</option>
                                        <option value="Desa Lakutan"
                                            {{ $dataUmum->kelurahan == 'Desa Lakutan' ? 'selected' : '' }}>Desa Lakutan
                                        </option>
                                        <option value="Desa Muara Laung II"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Laung II' ? 'selected' : '' }}>Desa
                                            Muara Laung II</option>
                                        <option value="Desa Muara Maruwei I"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Maruwei I' ? 'selected' : '' }}>Desa
                                            Muara Maruwei I</option>
                                        <option value="Desa Muara Maruwei II"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Maruwei II' ? 'selected' : '' }}>Desa
                                            Muara Maruwei II</option>
                                        <option value="Desa Muara Tupuh"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Tupuh' ? 'selected' : '' }}>Desa Muara
                                            Tupuh</option>
                                        <option value="Desa Narui"
                                            {{ $dataUmum->kelurahan == 'Desa Narui' ? 'selected' : '' }}>Desa Narui
                                        </option>
                                        <option value="Desa Pelaci"
                                            {{ $dataUmum->kelurahan == 'Desa Pelaci' ? 'selected' : '' }}>Desa Pelaci
                                        </option>
                                        <option value="Desa Penda Siron"
                                            {{ $dataUmum->kelurahan == 'Desa Penda Siron' ? 'selected' : '' }}>Desa Penda
                                            Siron</option>
                                        <option value="Desa Tahujan Laung"
                                            {{ $dataUmum->kelurahan == 'Desa Tahujan Laung' ? 'selected' : '' }}>Desa
                                            Tahujan Laung</option>
                                        <option value="Desa Tawai Haui"
                                            {{ $dataUmum->kelurahan == 'Desa Tawai Haui' ? 'selected' : '' }}>Desa Tawai
                                            Haui</option>
                                        <option value="Desa Tumbang Bahan"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Bahan' ? 'selected' : '' }}>Desa
                                            Tumbang Bahan</option>
                                        <option value="Desa Tumbang Bana"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Bana' ? 'selected' : '' }}>Desa
                                            Tumbang Bana</option>
                                        <option value="Desa Tumbang Bondang"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Bondang' ? 'selected' : '' }}>Desa
                                            Tumbang Bondang</option>
                                        <option value="Desa Tumbang Tonduk"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Tonduk' ? 'selected' : '' }}>Desa
                                            Tumbang Tonduk</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Murung">
                                        <option value="Kelurahan Puruk Cahu"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Puruk Cahu' ? 'selected' : '' }}>
                                            Kelurahan Puruk Cahu</option>
                                        <option value="Kelurahan Beriwit"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Beriwit' ? 'selected' : '' }}>Kelurahan
                                            Beriwit</option>
                                        <option value="Desa Bahitom"
                                            {{ $dataUmum->kelurahan == 'Desa Bahitom' ? 'selected' : '' }}>Desa Bahitom
                                        </option>
                                        <option value="Desa Batu Putih"
                                            {{ $dataUmum->kelurahan == 'Desa Batu Putih' ? 'selected' : '' }}>Desa Batu
                                            Putih</option>
                                        <option value="Desa Danau Usung"
                                            {{ $dataUmum->kelurahan == 'Desa Danau Usung' ? 'selected' : '' }}>Desa Danau
                                            Usung</option>
                                        <option value="Desa Dirung"
                                            {{ $dataUmum->kelurahan == 'Desa Dirung' ? 'selected' : '' }}>Desa Dirung
                                        </option>
                                        <option value="Desa Juking Pajang"
                                            {{ $dataUmum->kelurahan == 'Desa Juking Pajang' ? 'selected' : '' }}>Desa
                                            Juking Pajang</option>
                                        <option value="Desa Malasan"
                                            {{ $dataUmum->kelurahan == 'Desa Malasan' ? 'selected' : '' }}>Desa Malasan
                                        </option>
                                        <option value="Desa Mangkahui"
                                            {{ $dataUmum->kelurahan == 'Desa Mangkahui' ? 'selected' : '' }}>Desa Mangkahui
                                        </option>
                                        <option value="Desa Muara Bumban"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Bumban' ? 'selected' : '' }}>Desa Muara
                                            Bumban</option>
                                        <option value="Desa Muara Jaan"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Jaan' ? 'selected' : '' }}>Desa Muara
                                            Jaan</option>
                                        <option value="Desa Muara Sumpoi"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Sumpoi' ? 'selected' : '' }}>Desa Muara
                                            Sumpoi</option>
                                        <option value="Desa Muara Untu"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Untu' ? 'selected' : '' }}>Desa Muara
                                            Untu</option>
                                        <option value="Desa Panuut"
                                            {{ $dataUmum->kelurahan == 'Desa Panuut' ? 'selected' : '' }}>Desa Panuut
                                        </option>
                                        <option value="Desa Penyang"
                                            {{ $dataUmum->kelurahan == 'Desa Penyang' ? 'selected' : '' }}>Desa Penyang
                                        </option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Permata Intan">
                                        <option value="Kelurahan Muara Bakanon"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Muara Bakanon' ? 'selected' : '' }}>
                                            Kelurahan Muara Bakanon</option>
                                        <option value="Kelurahan Tumbang Lahung"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Tumbang Lahung' ? 'selected' : '' }}>
                                            Kelurahan Tumbang Lahung</option>
                                        <option value="Desa Baratu"
                                            {{ $dataUmum->kelurahan == 'Desa Baratu' ? 'selected' : '' }}>Desa Baratu
                                        </option>
                                        <option value="Desa Juking Sopan"
                                            {{ $dataUmum->kelurahan == 'Desa Juking Sopan' ? 'selected' : '' }}>Desa Juking
                                            Sopan</option>
                                        <option value="Desa Muara Babuat"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Babuat' ? 'selected' : '' }}>Desa Muara
                                            Babuat</option>
                                        <option value="Desa Pantai Laga"
                                            {{ $dataUmum->kelurahan == 'Desa Pantai Laga' ? 'selected' : '' }}>Desa Pantai
                                            Laga</option>
                                        <option value="Desa Purnama"
                                            {{ $dataUmum->kelurahan == 'Desa Purnama' ? 'selected' : '' }}>Desa Purnama
                                        </option>
                                        <option value="Desa Sungai Bakanon"
                                            {{ $dataUmum->kelurahan == 'Desa Sungai Bakanon' ? 'selected' : '' }}>Desa
                                            Sungai Bakanon</option>
                                        <option value="Desa Sungai Batang"
                                            {{ $dataUmum->kelurahan == 'Desa Sungai Batang' ? 'selected' : '' }}>Desa
                                            Sungai Batang</option>
                                        <option value="Desa Sungai Gula"
                                            {{ $dataUmum->kelurahan == 'Desa Sungai Gula' ? 'selected' : '' }}>Desa Sungai
                                            Gula</option>
                                        <option value="Desa Sungai Lobang"
                                            {{ $dataUmum->kelurahan == 'Desa Sungai Lobang' ? 'selected' : '' }}>Desa
                                            Sungai Lobang</option>
                                        <option value="Desa Tumbang Salio"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Salio' ? 'selected' : '' }}>Desa
                                            Tumbang Salio</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Seribu Riam">
                                        <option value="Desa Parahau"
                                            {{ $dataUmum->kelurahan == 'Desa Parahau' ? 'selected' : '' }}>Desa Parahau
                                        </option>
                                        <option value="Desa Muara Joloi I"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Joloi I' ? 'selected' : '' }}>Desa Muara
                                            Joloi I</option>
                                        <option value="Desa Muara Joloi II"
                                            {{ $dataUmum->kelurahan == 'Desa Muara Joloi II' ? 'selected' : '' }}>Desa
                                            Muara Joloi II</option>
                                        <option value="Desa Tumbang Jojang"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Jojang' ? 'selected' : '' }}>Desa
                                            Tumbang Jojang</option>
                                        <option value="Desa Tumbang Naan"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Naan' ? 'selected' : '' }}>Desa
                                            Tumbang Naan</option>
                                        <option value="Desa Tumbang Takajung"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Takajung' ? 'selected' : '' }}>Desa
                                            Tumbang Takajung</option>
                                        <option value="Desa Tumbang Tohan"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Tohan' ? 'selected' : '' }}>Desa
                                            Tumbang Tohan</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Sumber Barito">
                                        <option value="Kelurahan Tumbang Kunyi"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Tumbang Kunyi' ? 'selected' : '' }}>
                                            Kelurahan Tumbang Kunyi</option>
                                        <option value="Desa Batu Makap"
                                            {{ $dataUmum->kelurahan == 'Desa Batu Makap' ? 'selected' : '' }}>Desa Batu
                                            Makap</option>
                                        <option value="Desa Kelapeh Baru"
                                            {{ $dataUmum->kelurahan == 'Desa Kelapeh Baru' ? 'selected' : '' }}>Desa
                                            Kelapeh Baru</option>
                                        <option value="Desa Laas Baru"
                                            {{ $dataUmum->kelurahan == 'Desa Laas Baru' ? 'selected' : '' }}>Desa Laas Baru
                                        </option>
                                        <option value="Desa Olong Liko"
                                            {{ $dataUmum->kelurahan == 'Desa Olong Liko' ? 'selected' : '' }}>Desa Olong
                                            Liko</option>
                                        <option value="Desa Telok Jolo"
                                            {{ $dataUmum->kelurahan == 'Desa Telok Jolo' ? 'selected' : '' }}>Desa Telok
                                            Jolo</option>
                                        <option value="Desa Tumbang Kunyi"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Kunyi' ? 'selected' : '' }}>Desa
                                            Tumbang Kunyi</option>
                                        <option value="Desa Tumbang Molut"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Molut' ? 'selected' : '' }}>Desa
                                            Tumbang Molut</option>
                                        <option value="Desa Tumbang Tuan"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Tuan' ? 'selected' : '' }}>Desa
                                            Tumbang Tuan</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Sungai Babuat">
                                        <option value="Desa Mirau"
                                            {{ $dataUmum->kelurahan == 'Desa Mirau' ? 'selected' : '' }}>Desa Mirau
                                        </option>
                                        <option value="Desa Tambelum"
                                            {{ $dataUmum->kelurahan == 'Desa Tambelum' ? 'selected' : '' }}>Desa Tambelum
                                        </option>
                                        <option value="Desa Tumbang Apat"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Apat' ? 'selected' : '' }}>Desa
                                            Tumbang Apat</option>
                                        <option value="Desa Tumbang Bantian"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Bantian' ? 'selected' : '' }}>Desa
                                            Tumbang Bantian</option>
                                        <option value="Desa Tumbang Kolon"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Kolon' ? 'selected' : '' }}>Desa
                                            Tumbang Kolon</option>
                                        <option value="Desa Tumbang Saan"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Saan' ? 'selected' : '' }}>Desa
                                            Tumbang Saan</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Tanah Siang">
                                        <option value="Kelurahan Saripoi"
                                            {{ $dataUmum->kelurahan == 'Kelurahan Saripoi' ? 'selected' : '' }}>Kelurahan
                                            Saripoi</option>
                                        <option value="Desa Belawan"
                                            {{ $dataUmum->kelurahan == 'Desa Belawan' ? 'selected' : '' }}>Desa Belawan
                                        </option>
                                        <option value="Desa Dirung Bakung"
                                            {{ $dataUmum->kelurahan == 'Desa Dirung Bakung' ? 'selected' : '' }}>Desa
                                            Dirung Bakung</option>
                                        <option value="Desa Doan Arung"
                                            {{ $dataUmum->kelurahan == 'Desa Doan Arung' ? 'selected' : '' }}>Desa Doan
                                            Arung</option>
                                        <option value="Desa Cangkang"
                                            {{ $dataUmum->kelurahan == 'Desa Cangkang' ? 'selected' : '' }}>Desa Cangkang
                                        </option>
                                        <option value="Desa Kalang Kaluh"
                                            {{ $dataUmum->kelurahan == 'Desa Kalang Kaluh' ? 'selected' : '' }}>Desa
                                            Kalang Kaluh</option>
                                        <option value="Desa Karali"
                                            {{ $dataUmum->kelurahan == 'Desa Karali' ? 'selected' : '' }}>Desa Karali
                                        </option>
                                        <option value="Desa Kolam"
                                            {{ $dataUmum->kelurahan == 'Desa Kolam' ? 'selected' : '' }}>Desa Kolam
                                        </option>
                                        <option value="Desa Konut"
                                            {{ $dataUmum->kelurahan == 'Desa Konut' ? 'selected' : '' }}>Desa Konut
                                        </option>
                                        <option value="Desa Mahanyan"
                                            {{ $dataUmum->kelurahan == 'Desa Mahanyan' ? 'selected' : '' }}>Desa Mahanyan
                                        </option>
                                        <option value="Desa Mangkalisoi"
                                            {{ $dataUmum->kelurahan == 'Desa Mangkalisoi' ? 'selected' : '' }}>Desa
                                            Mangkalisoi</option>
                                        <option value="Desa Mantiat Pari"
                                            {{ $dataUmum->kelurahan == 'Desa Mantiat Pari' ? 'selected' : '' }}>Desa
                                            Mantiat Pari</option>
                                        <option value="Desa Muwun"
                                            {{ $dataUmum->kelurahan == 'Desa Muwun' ? 'selected' : '' }}>Desa Muwun
                                        </option>
                                        <option value="Desa Nono Kliwon"
                                            {{ $dataUmum->kelurahan == 'Desa Nono Kliwon' ? 'selected' : '' }}>Desa Nono
                                            Kliwon</option>
                                        <option value="Desa Olung Balo"
                                            {{ $dataUmum->kelurahan == 'Desa Olung Balo' ? 'selected' : '' }}>Desa Olung
                                            Balo</option>
                                        <option value="Desa Olung Dojou"
                                            {{ $dataUmum->kelurahan == 'Desa Olung Dojou' ? 'selected' : '' }}>Desa Olung
                                            Dojou</option>
                                        <option value="Desa Olung Nango"
                                            {{ $dataUmum->kelurahan == 'Desa Olung Nango' ? 'selected' : '' }}>Desa Olung
                                            Nango</option>
                                        <option value="Desa Olung Siron"
                                            {{ $dataUmum->kelurahan == 'Desa Olung Siron' ? 'selected' : '' }}>Desa Olung
                                            Siron</option>
                                        <option value="Desa Olung Soloi"
                                            {{ $dataUmum->kelurahan == 'Desa Olung Soloi' ? 'selected' : '' }}>Desa Olung
                                            Soloi</option>
                                        <option value="Desa Olung Ulu"
                                            {{ $dataUmum->kelurahan == 'Desa Olung Ulu' ? 'selected' : '' }}>Desa Olung
                                            Ulu</option>
                                        <option value="Desa Osom Tompok"
                                            {{ $dataUmum->kelurahan == 'Desa Osom Tompok' ? 'selected' : '' }}>Desa Osom
                                            Tompok</option>
                                        <option value="Desa Puruk Batu"
                                            {{ $dataUmum->kelurahan == 'Desa Puruk Batu' ? 'selected' : '' }}>Desa Puruk
                                            Batu</option>
                                        <option value="Desa Saruhung"
                                            {{ $dataUmum->kelurahan == 'Desa Saruhung' ? 'selected' : '' }}>Desa Saruhung
                                        </option>
                                        <option value="Desa Sungai Lunuk"
                                            {{ $dataUmum->kelurahan == 'Desa Sungai Lunuk' ? 'selected' : '' }}>Desa
                                            Sungai Lunuk</option>
                                        <option value="Desa Tabulang"
                                            {{ $dataUmum->kelurahan == 'Desa Tabulang' ? 'selected' : '' }}>Desa Tabulang
                                        </option>
                                        <option value="Desa Tino Talih"
                                            {{ $dataUmum->kelurahan == 'Desa Tino Talih' ? 'selected' : '' }}>Desa Tino
                                            Talih</option>
                                        <option value="Desa Tokung"
                                            {{ $dataUmum->kelurahan == 'Desa Tokung' ? 'selected' : '' }}>Desa Tokung
                                        </option>
                                        <option value="Desa Tumbang Salio"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Salio' ? 'selected' : '' }}>Desa
                                            Tumbang Salio</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Tanah Siang Selatan">
                                        <option value="Desa Datah Kotou"
                                            {{ $dataUmum->kelurahan == 'Desa Datah Kotou' ? 'selected' : '' }}>Desa Datah
                                            Kotou</option>
                                        <option value="Desa Dirung Lingkin"
                                            {{ $dataUmum->kelurahan == 'Desa Dirung Lingkin' ? 'selected' : '' }}>Desa
                                            Dirung Lingkin</option>
                                        <option value="Desa Olung Hanangan"
                                            {{ $dataUmum->kelurahan == 'Desa Olung Hanangan' ? 'selected' : '' }}>Desa
                                            Olung Hanangan</option>
                                        <option value="Desa Olung Muro"
                                            {{ $dataUmum->kelurahan == 'Desa Olung Muro' ? 'selected' : '' }}>Desa Olung
                                            Muro</option>
                                        <option value="Desa Oreng"
                                            {{ $dataUmum->kelurahan == 'Desa Oreng' ? 'selected' : '' }}>Desa Oreng
                                        </option>
                                        <option value="Puruk Kambang"
                                            {{ $dataUmum->kelurahan == 'Puruk Kambang' ? 'selected' : '' }}>Puruk Kambang
                                        </option>
                                        <option value="Desa Tahujan Ontu"
                                            {{ $dataUmum->kelurahan == 'Desa Tahujan Ontu' ? 'selected' : '' }}>Desa
                                            Tahujan Ontu</option>
                                    </optgroup>

                                    <optgroup label="Kecamatan Uut Murung">
                                        <option value="Desa Kalasin"
                                            {{ $dataUmum->kelurahan == 'Desa Kalasin' ? 'selected' : '' }}>Desa Kalasin
                                        </option>
                                        <option value="Desa Tumbang Olong I"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Olong I' ? 'selected' : '' }}>Desa
                                            Tumbang Olong I</option>
                                        <option value="Desa Tumbang Olung II"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Olung II' ? 'selected' : '' }}>Desa
                                            Tumbang Olung II</option>
                                        <option value="Desa Tumbang Topus"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Topus' ? 'selected' : '' }}>Desa
                                            Tumbang Topus</option>
                                        <option value="Desa Tumbang Tujang"
                                            {{ $dataUmum->kelurahan == 'Desa Tumbang Tujang' ? 'selected' : '' }}>Desa
                                            Tumbang Tujang</option>
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
                                    <option value="Barito Tuhup Raya"
                                        {{ $dataUmum->kecamatan == 'Barito Tuhup Raya' ? 'selected' : '' }}>Barito Tuhup
                                        Raya</option>
                                    <option value="Laung Tuhup"
                                        {{ $dataUmum->kecamatan == 'Laung Tuhup' ? 'selected' : '' }}>Laung Tuhup</option>
                                    <option value="Murung" {{ $dataUmum->kecamatan == 'Murung' ? 'selected' : '' }}>
                                        Murung</option>
                                    <option value="Permata Intan"
                                        {{ $dataUmum->kecamatan == 'Permata Intan' ? 'selected' : '' }}>Permata Intan
                                    </option>
                                    <option value="Seribu Riam"
                                        {{ $dataUmum->kecamatan == 'Seribu Riam' ? 'selected' : '' }}>Seribu Riam</option>
                                    <option value="Sumber Barito"
                                        {{ $dataUmum->kecamatan == 'Sumber Barito' ? 'selected' : '' }}>Sumber Barito
                                    </option>
                                    <option value="Sungai Babuat"
                                        {{ $dataUmum->kecamatan == 'Sungai Babuat' ? 'selected' : '' }}>Sungai Babuat
                                    </option>
                                    <option value="Tanah Siang"
                                        {{ $dataUmum->kecamatan == 'Tanah Siang' ? 'selected' : '' }}>Tanah Siang</option>
                                    <option value="Tanah Siang Selatan"
                                        {{ $dataUmum->kecamatan == 'Tanah Siang Selatan' ? 'selected' : '' }}>Tanah Siang
                                        Selatan</option>
                                    <option value="Uut Murung"
                                        {{ $dataUmum->kecamatan == 'Uut Murung' ? 'selected' : '' }}>Uut Murung</option>
                                </select>
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
                                <select name="kbli_ids[]" id="kbliSelect" class="form-control select2-kbli" multiple>
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
