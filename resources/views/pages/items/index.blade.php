@extends('layouts.apps.global')
@section('items', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div class="col-sm-6">
            <h1 class="h3 mb-3">Data Item</h1>
            <a class="btn btn-primary" href="{{ route('items.create') }}">Tambah Item</a>
        </div>

        <div class="card flex-fill mt-3">
            <table class="table table-hover my-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 5%">id</th>
                        <th style="width: 16%" class="d-none d-xl-table-cell">Nama</th>
                        <th style="width: 16%" class="d-none d-xl-table-cell">Image</th>
                        <th style="width: 18%" class="d-none d-xl-table-cell">Deskripsi</th>
                        <th style="width: 14%" class="d-none d-xl-table-cell">Harga</th>
                        <th style="width: 11%" class="d-none d-xl-table-cell text-center">Tersedia</th>
                        <th style="width: 11%" class="d-none d-xl-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $key => $item)
                    <tr>
                        <td style="width: 5%">{{ $key + 1 }}</td>
                        <td style="width: 16%">{{ $item->nama }}</td>
                        <td style="width: 16%" ><img width="80px" height="80px" src="{{ asset('picture/'. $item->picture) }}" alt="" srcset=""></td>
                        <td style="width: 16%" >{{ $item->deskripsi }}</td>
                        <td style="width: 11%">Rp.{{ $item->harga }} / hari</td>
                            <?php
                                if ($item->status == 'ya') {
                            ?>
                                    <td class="text-center"><span class="badge bg-success p-1">{{ $item->status }}</span></td>
                            <?php
                                }
                                else {
                            ?>
                                    <td class="text-center"><span class="badge bg-danger p-1">{{ $item->status }}</span></td>
                            <?php
                                }
                            ?>
                        <td style="width: 12%">
                            <a href="{{ route('items.edit',[$item->id]) }}" class="btn btn-sm bg-warning waves-effect waves-light">Edit</a>
                            <form action="{{ route('items.destroy',[$item->id]) }}" method="post" class="d-inline">
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
    {{$items->links()}}
</main>



@endsection
