<?php

namespace App\DataTables;

use App\Admin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'dashboard.admins.edit')
            ->addColumn('delete', 'dashboard.admins.delete')
            ->rawColumns(['edit', 'delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Admin $admin)
    {
        return $admin->newQuery();
    }


    public static function translate()
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
    } // end of table translation

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('admindatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(['create', 'export', 'print', 'reset', 'reload'])
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 100]],


            ])
            ->initComplete(
                "function () {
                    this.api().columns([0, 1, 2, 3]).every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    });
                }"
            )
            ->language(self::translate());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('username'),
            Column::make('email'),
            Column::make('created_at'),
            // Column::make('created_at'),
            Column::computed('edit')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->addClass('text-center'),
            Column::computed('delete')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
