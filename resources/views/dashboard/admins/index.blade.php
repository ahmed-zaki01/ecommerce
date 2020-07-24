@extends('dashboard.layout', ['title' => 'Admin Control'])

@push('styles')
<link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="py-5 px-3">
    {!! $dataTable->table(['class' => 'table table-hover table-stripe'], true) !!}
</div>
@endsection

@push('scripts')
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
{!! $dataTable->scripts() !!}
@endpush
