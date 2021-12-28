@extends('layouts.apps.global')
@section('transaction', 'active')

@section('content')
    <main class="content">
        <div class="row align-item-center">
            <div class="col-sm-6">
                <h4 class="font-size-18">Tambah Transaksi Baru</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('transaction.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Nama Customer</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="nama_cust" id="nama_cust" placeholder="Masukkan Nama">
                                </div>
                                @foreach ($errors->get('nama_cust') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">No Identitas</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="no_identitas" id="no_identitas" placeholder="Masukkan No Identitas">
                                </div>
                                @foreach ($errors->get('no_identitas') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">No Telp</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="no_telp" id="no_telp" placeholder="Masukkan No Telphone">
                                </div>
                                @foreach ($errors->get('no_telp') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Item</h5>
                                <div class="col-sm-15 mt-2">
                                    <select name="item_id" class="form-select" aria-label="Default select example" id="">
                                        <option value="">Pilih Item</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach ($errors->get('item_id') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div class="form-group row mb-3">
                                <h5 class="card-title mb-0">Durasi</h5>
                                <div class="col-sm-15 mt-2">
                                    <input class="form-control" htmlspecialchars type="text" name="durasi" id="durasi" placeholder="Masukkan Lama Waktu Sewa Dalam Hari">
                                </div>
                                @foreach ($errors->get('durasi') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                            </div>
                            <div>
                                <button class="btn btn-primary waves-effect waves-light" type="submit">OK</button>
                                <a class="btn btn-secondary" href="{{ route('transaction.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection