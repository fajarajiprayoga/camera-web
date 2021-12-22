@extends('layouts.apps.global')
@section('dashboard', 'active')
@section('content')

<script src="{{ asset('js.app.js') }}"></script>
{{-- {{asset('adminkit/static/img/avatars/avatar.jpg')}} --}}

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Dashboard Analytic</h1>

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Subscribers</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $jml_sub }}</h1>
                        <div class="mb-0">
                            <span class="text-muted">Jumlah Total Subscribers</span>
                            <a href="{{ route('subexport') }}" class="btn btn-success" style="margin-left: 30px">Print</a>
                        </div>
                    </div>
                </div>
                    
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Transaksi Aktif</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $jml_tran }}</h1>
                        <div class="mb-0">
                            <span class="text-muted">Jumlah Transaksi Aktif</span>
                            <a href="{{ route('transaction.index') }}" class="btn btn-info" style="margin-left: 30px">Transaksi</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Tanggal & Jam</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="compass"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ $tanggal }}</h1>
                        <div class="mb-0">
                            <span class="text-muted">{{ $jam }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <td style="width: 2%">No</td>
                        <td style="width: 10%">Email</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $key => $subscriber)
                    <tr>
                        <td style="width: 4%">{{ $key+1 }}</td>
                        <td style="width: 10%">{{ $subscriber->subscriber }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{ $subscribers->links() }}
            </div>
            <div class="col-md-8">
                <table class="table table-hover" style="">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 2%">No</th>
                            <th>Catatan</th>
                            <th>  Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catatan as $key => $catatan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $catatan->catatan }}</td>
                            <td style="width: 15%">
                                <form action="{{ route('dashboard.destroy',[$catatan->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    {{-- <a class="badge btn bg-danger">Delete</a> --}}
                                    <input class="btn btn-sm text-white bg-danger" type="submit" value="Hapus">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('dashboard.create') }}">Tambah</a>
                
            </div>
        </div>
</main>

@endsection

