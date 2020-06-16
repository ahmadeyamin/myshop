@extends('layouts.backend.layout')

@push('css')

@endpush

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="mt-4">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
{!! $chart->script() !!}
@endpush


