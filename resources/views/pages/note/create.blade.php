@extends('layouts.apps.global')
@section('dashboard', 'active')
@section('content')
    <main class="content">
        <div class="row align-item-center">
            <div class="col-sm-6">
                <h4 class="font-size-18">Tambah Catatan Baru</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.store') }}" method="post">
                            @csrf
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Catatan</h5>
                                <div class="col-sm-15 mt-2">
                                    {{-- <input class="form-control" htmlspecialchars type="text" name="catatan" id="catatan" placeholder="Masukkan Catatan"> --}}
                                    <textarea class="form-control" name="catatan" id="atatan" cols="30" rows="10"></textarea>
                                </div>
                                @foreach ($errors->get('catatan') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div>
                                <button class="btn btn-primary waves-effect waves-light" type="submit">OK</button>
                                <a class="btn btn-secondary" href="{{ route('dashboard.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection