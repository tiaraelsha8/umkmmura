@extends('backend.layouts.master')

@section('judul')
    Halaman Edit Profile
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
        <h1 class="h3 mb-2 text-gray-800">Edit Data Profile</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                            </div>
                            @error('usernmae')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group position-relative">
                                <label>Password Lama</label>
                                <input type="password" class="form-control" name="current_password" id="password"
                                    placeholder="isikan password lama saat mengubah email,username,nama,password">
                                <span class="position-absolute" style="right:10px; top:38px; cursor:pointer;"
                                    onclick="this.previousElementSibling.type = this.previousElementSibling.type === 'password' ? 'text' : 'password';this.innerHTML = this.previousElementSibling.type === 'password' ? 
                                    '<i class=\'fas fa-eye\'></i>' : '<i class=\'fas fa-eye-slash\'></i>';">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            @error('current_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group position-relative">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="kosongkan jika tidak ingin mengubah password">
                                <span class="position-absolute" style="right:10px; top:38px; cursor:pointer;"
                                    onclick="this.previousElementSibling.type = this.previousElementSibling.type === 'password' ? 'text' : 'password';this.innerHTML = this.previousElementSibling.type === 'password' ? 
                                    '<i class=\'fas fa-eye\'></i>' : '<i class=\'fas fa-eye-slash\'></i>';">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group position-relative">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password"
                                    placeholder="isikan jika mengubah password">
                                <span class="position-absolute" style="right:10px; top:38px; cursor:pointer;"
                                    onclick="this.previousElementSibling.type = this.previousElementSibling.type === 'password' ? 'text' : 'password';this.innerHTML = this.previousElementSibling.type === 'password' ? 
                                    '<i class=\'fas fa-eye\'></i>' : '<i class=\'fas fa-eye-slash\'></i>';">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>
                                        Superadmin</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}</option>
                                    <option value="viewer"{{ $user->role === 'viewer' ? 'selected' : '' }}>View</option>
                                </select>
                            </div>
                            @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('backend.dashboard') }}" class="btn btn-default">Kembali</a>
                            </div>
                        </div>

                        @if (session('secondsRemaining'))
                            <div class="alert alert-warning">
                                Anda telah mencoba terlalu banyak. Tunggu <span id="countdown"
                                    style="font-weight: bold"></span>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
