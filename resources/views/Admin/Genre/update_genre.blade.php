@extends('Layout.main_admin')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/genre/update/{{ $genre->id_genre }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama_genre" class="form-label">Harga</label>
                    <input type="text" name="nama_genre" class="form-control @error('nama_genre') is-invalid @enderror" id="nama_genre" value="{{ old('nama_genre', $genre->nama_genre) }}">
                    @error('nama_genre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Genre</button>
            </form>
        </div>
    </div>
</div>

@endsection

