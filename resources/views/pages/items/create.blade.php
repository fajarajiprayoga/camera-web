@extends('layouts.apps.global')
@section('items', 'active')
@section('content')
    <main class="content">
        <div class="row align-item-center">
            <div class="col-sm-6">
                <h4 class="font-size-18">Tambah Item Baru</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Nama Item</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="nama" id="nama" placeholder="Masukkan Nama Item">
                                </div>
                                @foreach ($errors->get('nama') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Image</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" type="file" name="picture" id="picture">
                                </div>
                                @foreach ($errors->get('picture') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Deskripsi</h5>
                                <div class="col-sm-15 mt-2">
                                    {{-- <input class="form-control" htmlspecialchars type="text" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Item"> --}}
                                    <textarea class="form-control" name="deskripsi" htmlspecialchars id="deskripsi" cols="30" rows="10"></textarea>
                                </div>
                                @foreach ($errors->get('deskripsi') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Harga</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="harga" id="harga" placeholder="Masukkan Harga Item">
                                </div>
                                @foreach ($errors->get('harga') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div>
                                <button class="btn btn-primary waves-effect waves-light" type="submit">OK</button>
                                <a class="btn btn-secondary" href="{{ route('items.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection