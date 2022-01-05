@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
<div class="d-grid col-2 mt-5">
    <a href="/lahan/create" class="btn btn-primary">+Insert
    </a>
</div>
    
    <hr>
    <table class="table table-striped table-lg">
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
            <tr>
            @foreach ($lahans as $lahan)
                <td>{{ $lahan->supplier }}</td>
                <td>{{ $lahan->luas }}</td>
                <td>{{ $lahan->categorylahan }}</td>
                <td>{{ $lahan->lokasi }}</td>
                <td>{{ $lahan->keterangan }}</td>
                <td>{{ $lahan->statlahan }}</td>
                <td>
                    <a class="btn btn-primary" href="/lahan/edit/{{ $lahan->id }}">Edit</a>
                    <a class="btn btn-danger" href="/lahan/destroy/{{ $lahan->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection