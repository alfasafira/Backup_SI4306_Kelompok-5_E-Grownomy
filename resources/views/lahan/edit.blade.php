@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="content mt-4">
        <div class="row">
            <div class="col-4">
                <img src="/img/egrownomy.png" alt="" class="img-fluid">
            </div>
            <div class="col-6">
                <form action="/lahan/update/{{ $lahan->id }}" method="post" id="lahan-insertion-form">
                    @csrf
                    <h3>Ubah data Lahan</h3>
                    <div class="mb-2">
                        <label for="luas" class="form-label">Luas Lahan (Hektar)</label>
                        <input type="text" class="form-control" name="luas" id="luas" value="{{ $lahan->luas }}" required>
                        @error('luas')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="categorylahan" class="form-label">Kategori Lahan</label>
                        <input list="categories" class="form-control" name="categorylahan" id="categorylahan" value="{{ $lahan->categorylahan }}">
                            <datalist id="categories">
                                <option value="Lahan Pertanian">
                                <option value="Lahan Perkebunan">
                                <option value="Lahan Peternakan">
                            </datalist>
                    </div>
                    <div class="mb-2">
                        <label for="lokasi" class="form-label">Alamat Lokasi Lahan</label>
                        <textarea class="form-control" name="lokasi" id="lokasi" cols="25" rows="4" form="lahan-insertion-form" required>{{ $lahan->lokasi }}</textarea>
                        @error('lokasi')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="keterangan" class="form-label">Keterangan Lahan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="25" rows="4" form="lahan-insertion-form" required>{{ $lahan->keterangan }}</textarea>
                        @error('keterangan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="hidden" name="statlahan" value="Menunggu Verifikasi">
                        @error('statlahan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="supplier" value="{{ auth()->user()->username }}">
                    <div class="d-grid mb-5">
                        <button type="submit" class="submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection