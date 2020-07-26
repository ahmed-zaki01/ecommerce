@extends('dashboard.layout', ['title' => 'Admin Control'])

@push('styles')
<link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
{!! Form::open() !!}
{!! Form::close() !!}
<div class="py-5 px-3">
    {!! $dataTable->table(['class' => 'table table-hover table-stripe'], true) !!}
</div>

{{-- delete table data modal --}}
<div id="delete-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete All Admins</h5>
            </div>
            <div class="modal-body py-4 font-weight-bold text-danger">
                <div class="empty-record d-none">
                    @lang('site.check_records')
                </div>
                <div class="not-empty-record d-none">
                    @lang('site.delete_all_text_modal')
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="delete_all" value="@lang('site.confirm')" class="btn btn-danger delete-submit-btn">
                <button id="close-modal" type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
{!! $dataTable->scripts() !!}
<script src="{{asset('dashboard/dist/js/script.js')}}"></script>

@endpush