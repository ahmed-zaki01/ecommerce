<?php

if (!function_exists('admin_guard')) {
    function admin_guard()
    {
        return auth()->guard('admin');
    }
} // end of admin guard authenticate helper


if (!function_exists('admin_guard')) {
    function admin_guard()
    {
        return auth()->guard('admin');
    }
}

if (!function_exists('translate')) {

    function translate()
    {
        return [
            'sEmptyTable' => trans('site.datatable.sEmptyTable'),
            'sInfo' => trans('site.datatable.sInfo'),
            'sInfoEmpty' => trans('site.datatable.sInfoEmpty'),
            'sInfoFiltered' => trans('site.datatable.sInfoFiltered'),
            'sInfoPostFix' => trans('site.datatable.sInfoPostFix'),
            'sInfoThousands' => trans('site.datatable.sInfoThousands'),
            'sLengthMenu' => trans('site.datatable.sLengthMenu'),
            'sLoadingRecords' => trans('site.datatable.sLoadingRecords'),
            'sProcessing' => trans('site.datatable.sProcessing'),
            'sSearch' => trans('site.datatable.sSearch'),
            'sZeroRecords' => trans('site.datatable.sZeroRecords'),
            'oPaginate' => [
                'sFirst' => trans('site.datatable.sFirst'),
                'sPrevious' => trans('site.datatable.sPrevious'),
                'sNext' => trans('site.datatable.sNext'),
                'sLast' => trans('site.datatable.sLast'),
            ],
            'oAria' => [
                'sSortAscending' => trans('site.datatable.sSortAscending'),
                'sSortDescending' => trans('site.datatable.sSortDescending'),
            ],

        ];
    }
} // end of table translation
