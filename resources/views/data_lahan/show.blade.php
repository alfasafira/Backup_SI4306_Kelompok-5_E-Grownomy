@extends('layout')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $table }}</h3>
                <p class="text-subtitle text-muted">Data dari {{ $table }}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $table }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                {{ $table }}
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                        <th scope="col">Pemilik</th>
                        <th scope="col">Luas Lahan (Hektar)</th>
                        <th scope="col">Kategori Lahan</th>
                        <th scope="col">Alamat Lokasi Lahan</th>
                        <th scope="col">Keterangan Lahan</th>
                        <th scope="col">Status Verifikasi</th>
                        <th scope="col">Aksi</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach ($lahan as $item)
                            <tr>
                                <td>{{ $item->supplier }}</td>
                                <td>{{ $item->luas }}</td>
                                <td>{{ $item->categorylahan }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->statlahan }}</td>
                                <td>
                                    <a href="/data_lahan/edit/{{ $item->id }}" class="btn btn-warning">Edit Status</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
