@extends('layouts.apps.global')
@section('transaction', 'active')
    
@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div class="col-sm-6">
            <h1 class="h3 mb-3">Transaksi Aktif</h1>
            <a class="btn btn-primary" href="{{ route('transaction.create') }}">Tambah Transaksi Baru</a>
        </div>

        <div class="card flex-fill mt-3">
            <table class="table table-hover my-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%" class="d-none d-xl-table-cell" >Id</th>
                        <th style="width: 20%" class="d-none d-xl-table-cell">Nama Customer</th>
                        <th style="width: 15%" class="d-none d-xl-table-cell">No Identitas</th>
                        <th style="width: 20%" class="d-none d-xl-table-cell">Item</th>
                        <th style="width: 10%" class="d-none d-xl-table-cell">No Telp</th>
                        <th style="width: 10%" class="d-none d-xl-table-cell">Tanggal</th>
                        <th style="width: 12%" class="d-none d-xl-table-cell">Total</th>
                        <th style="width: 14%" class="d-none d-xl-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transaction)
                        <tr>
                            <td style="width: 5%">{{ $transaction->id }}</td>
                            <td style="width: 18%">{{ $transaction->nama_cust }}</td>
                            <td style="width: 15%">{{ $transaction->no_identitas }}</td>
                            <td style="width: 15%">{{ $transaction->items->nama }} </td>
                            <td style="width: 6%">{{ $transaction->no_telp }}</td>
                            <td style="width: 10%">{{ $transaction->tglkmbli }}</td>
                            <td style="width: 15%">Rp.{{ $transaction->total_harga }}</td>
                            <td style="width: 14%">
                                <form action="{{ route('transaction.destroy',[$transaction->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    {{-- <a class="badge btn bg-danger">Delete</a> --}}
                                    <input class="btn btn-sm text-white bg-danger" type="submit" value="Selesai">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $transactions->links() }}
</main>



@endsection
