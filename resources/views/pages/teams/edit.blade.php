@extends('layouts.apps.global')
@section('teams', 'active')
@section('content')
    <main class="content">
        <div class="row align-item-center">
            <div class="col-sm-6">
                <h4 class="font-size-18">Tambah Anggota Tim Baru</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('teams.update', [$team->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <input type="hidden" name="old_foto" value="{{ $team->foto }}">
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Nama</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="nama" id="nama" value="{{ $team->nama }}">
                                </div>
                                @foreach ($errors->get('nama') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Foto</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" type="file" name="foto" id="foto">
                                </div>
                                @foreach ($errors->get('foto') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Nim</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="nim" id="nim" value="{{ $team->nim }}">
                                </div>
                                @foreach ($errors->get('nim') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Tugas</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="tugas" id="tugas" value="{{ $team->tugas }}">
                                </div>
                                @foreach ($errors->get('tugas') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div>
                                <button class="btn btn-primary waves-effect waves-light" type="submit">OK</button>
                                <a class="btn btn-secondary" href="{{ route('teams.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection