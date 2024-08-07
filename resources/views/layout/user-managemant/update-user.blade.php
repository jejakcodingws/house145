@extends('layout/user-managemant/index')

@section('konten-update-password')
<section class="container">
        <div class="login-container">
            <div class="form-container">
                <h1>Update Password </h1>
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('simpan-update-user', ['id' => $dataUser->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" value="{{old('for_nama_karyawan',$dataUser[0]->password)}}" name="old_password" class="form-control" required>
                        @error('old_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                        @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                        @error('new_password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>
    </section>
@endsection
