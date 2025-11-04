@extends('backend.layouts.master')

@section('judul')
    Halaman Tambah KBLI
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
        <h1 class="h3 mb-2 text-gray-800">Tambah Data KBLI</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Tombol untuk membuka modal -->
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#importModal">
                    Import Data KBLI dari File
                </button>

                <!-- Modal -->
                <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="POST" action="{{ route('kbli.import') }}" enctype="multipart/form-data"
                            class="modal-content">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="importModalLabel">Import Data KBLI</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="file">Pilih File</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form action="{{ route('kbli.store') }}" method="POST">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control" name="kode" placeholder="Isikan Kode">
                            </div>
                            @error('kode')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Nama KBLI</label>
                                <input type="text" class="form-control" name="nama" placeholder="Isikan Nama KBLI">
                            </div>
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                            </div>
                            @error('deskripsi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('kbli.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
