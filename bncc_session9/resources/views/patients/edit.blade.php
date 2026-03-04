@extends('layouts.app')

@section('content')
<h1>Edit Pasien</h1>

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

<form action="{{ route('patients.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name', $patient->name) }}" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $patient->email) }}" required>
    </div>

    <div>
        <label>Foto Saat Ini:</label><br>
        @if($patient->photo)
            <img src="{{ asset('storage/'.$patient->photo) }}" width="100"><br>
        @else
            Tidak ada foto
        @endif
    </div>

    <div>
        <label>Ganti Foto:</label>
        <input type="file" name="photo" accept="image/*">
    </div>

    <button type="submit">Update</button>
</form>
@endsection