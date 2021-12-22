@extends('layouts.apps.global')
@section('teams', 'active')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="col-sm-6">
            <h1 class="h3 mb-3">Data Anggota Tim</h1>
            <a class="btn btn-primary" href="{{ route('teams.create') }}">Tambah</a>
        </div>

        <div class="card flex-fill mt-3">
            <table class="table table-hover my-0">
                <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th class="d-none d-xl-table-cell">Foto</th>
                        <th class="d-none d-xl-table-cell">Nama</th>
                        <th class="d-none d-xl-table-cell">Nim</th>
                        <th class="d-none d-xl-table-cell">Tugas</th>
                        <th class="d-none d-xl-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $key => $team)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><img width="80px" height="80px" src="{{ asset('foto_tim/'. $team->foto) }}" alt="{{ asset('adminkit.src.img.avatars.avatar.jpg') }}" srcset=""></td>
                        <td>{{ $team->nama }}</td>
                        <td>{{ $team->nim }}</td>
                        <td>{{ $team->tugas }}</td>
                        <td>
                            <a href="{{ route('teams.edit',[$team->id]) }}" class="btn btn-sm bg-warning waves-effect waves-light">Edit</a>
                            <form action="{{ route('teams.destroy',[$team->id]) }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                {{-- <a class="badge btn bg-danger">Delete</a> --}}
                                <input class="btn btn-sm text-white bg-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $teams->links() }}
</main>
@endsection