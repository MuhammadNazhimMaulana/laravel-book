@extends('Layout.main_admin')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/buku/create" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control @error('judul_buku') is-invalid @enderror" id="judul_buku" placeholder="Ex Rintik Seduh ..." value="{{ old('judul_buku') }}">
                    @error('judul_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="penulisId" class="form-label">Nama Penulis</label>
                    <select class="form-select" name="penulisId">
                        @foreach ($writers as $writer)
                            @if(old('penulisId') == $writer->id)
                                <option value="{{ $writer->id }}" selected>{{ $writer->nama_penulis }}</option>
                            @else
                                <option value="{{ $writer->id }}">{{ $writer->nama_penulis }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="genreId" class="form-label">Genre Buku</label>
                    <select class="form-select" name="genreId">
                        @foreach ($genres as $genre)
                            @if(old('genreId') == $genre->id)
                                <option value="{{ $genre->id }}" selected>{{ $genre->nama_genre }}</option>
                            @else
                                <option value="{{ $genre->id }}">{{ $genre->nama_genre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                    <input type="number" name="jumlah_halaman" class="form-control @error('jumlah_halaman') is-invalid @enderror" id="jumlah_halaman" placeholder="Ex Horror ..." value="{{ old('jumlah_halaman') }}">
                    @error('jumlah_halaman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hargaId" class="form-label">Harga Buku</label>
                    <select class="form-select" name="hargaId">
                        @foreach ($prizes as $harga)
                            @if(old('hargaId') == $harga->id)
                                <option value="{{ $harga->id }}" selected>{{ $harga->harga_satuan }}</option>
                            @else
                                <option value="{{ $harga->id }}">{{ $harga->harga_satuan }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi</label>
                    <input type="date" name="tanggal_publikasi" class="form-control @error('tanggal_publikasi') is-invalid @enderror" id="tanggal_publikasi" placeholder="Ex Horror ..." value="{{ old('tanggal_publikasi') }}">
                    @error('tanggal_publikasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_buku" class="form-label">Upload Foto Buku</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('foto_buku') is-invalid @enderror" type="file" id="foto" name="foto_buku" onchange="previewImage()">
                    @error('foto_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Buku</button>
            </form>
        </div>
    </div>
</div>

@endsection

