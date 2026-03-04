@extends('layouts.app')

@section('content')
<h1>Daftar Pasien</h1>

<a href="{{ route('patients.create') }}" class="button">Tambah Pasien</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->id }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            <td>
                @if($patient->photo)
                    <img src="{{ asset('storage/'.$patient->photo) }}" width="100">
                @else
                    No Photo
                @endif
            </td>
            <td>
                <a href="{{ route('patients.edit', $patient->id) }}" class="button" style="background-color:green;">Edit</a>
                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection