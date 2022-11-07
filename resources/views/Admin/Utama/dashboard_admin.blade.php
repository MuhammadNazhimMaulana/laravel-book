@extends('Layout.main_admin')

@section('container')
<div class="values">

    <div class="board">
        <div style="width: 600px; margin: auto;">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

@section('script')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection

@endsection
