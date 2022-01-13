@extends('Layout.main_admin')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/harga/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="harga_satuan" class="form-label">Harga</label>
                    <input type="number" name="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" placeholder="Rp..." value="{{ old('harga_satuan') }}">
                    @error('harga_satuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Harga</button>
            </form>
        </div>
    </div>
</div>

@endsection

