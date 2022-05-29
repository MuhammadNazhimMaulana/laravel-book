@extends('Layout.main_admin')

@section('container')

{{-- Midtrans --}}
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-NgiArnTP4ZvhamTm"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
        </div>
    </div>

    <div class="board">

        {{-- Jikalau berhasil Ubah data --}}
        @if(session()->has('success-update'))
        <div class="alert alert-success" role="alert">
            {{ session('success-update') }}
        </div>
        @endif

        <button class="btn btn-primary" id="pay-button">Tambah Pembelian</button>
        
        <div class="d-flex justify-content-end mt-5">
        </div>

    </div>
</div>


{{-- Midtrans Javascript --}}
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
</script>
@endsection
