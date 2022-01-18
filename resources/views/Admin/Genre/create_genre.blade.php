@extends('Layout.main_admin')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/genre/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_genre" class="form-label">Genre</label>
                    <input type="text" name="nama_genre" class="form-control @error('nama_genre') is-invalid @enderror" id="nama_genre" placeholder="Ex Horror ..." value="{{ old('nama_genre') }}">
                    @error('nama_genre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Genre</button>
            </form>
        </div>
    </div>
</div>

@endsection

