@foreach ($carts as $cart)
{{-- Modal Update --}}
<div class="modal fade" id="ModalDelete{{ $cart->id }}" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/keranjang-buku/delete/{{ $cart->id }}" method="POST">
                    @method('delete')
                    @csrf
                    
                    {{-- Input Id Pembelian --}}
                    <input type="hidden" name="pembelianId" id="pembelianId" value="{{ $cart->pembelianId }}">    
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Data</button>
                </form>
              </div>
        </div>

    </div>
</div>
@endforeach