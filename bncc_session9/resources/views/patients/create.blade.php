@extends('layouts.app')

@section('content')
<h1>Tambah Pasien</h1>

<a href="{{ route('patients.index') }}">Kembali ke Daftar Pasien</a>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Foto:</label>
        <input type="file" name="photo" accept="image/*">
    </div>

    <button type="submit">Simpan</button>
</form>
@endsection