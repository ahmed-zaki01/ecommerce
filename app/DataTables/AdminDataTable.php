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
            ->addColumn('edit', 'dashboard.admins.buttons.edit')
            ->addColumn('delete', 'dashboard.admins.buttons.delete')
            ->addColumn('check', 'dashboard.admins.buttons.check')
            ->rawColumns(['edit', 'delete', 'check']);
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
            ->buttons([
                ['extend' => 'create', 'className' => ' mb-2', 'text' => '<i class="fas fa-plus mx-1"></i>' . trans('site.datatable.create')],
                ['extend' => 'export', 'className' => 'btn btn-info mb-2', 'text' => trans('site.datatable.export')],
                ['extend' => 'print', 'className' => 'btn btn-primary mb-2', 'text' => '<i class="fas fa-print mx-1"></i>' . trans('site.datatable.print')],
                ['extend' => 'reload', 'className' => 'btn btn-info mb-2', 'text' => '<i class="fas fa-sync-alt mx-1"></i>' .  trans('site.datatable.reload')],
                ['extend' => 'reset', 'className' => 'btn btn-primary mb-2', 'text' => '<i class="fas fa-redo mx-1"></i>' . trans('site.datatable.reset')],
                ['className' => 'btn btn-danger delete-btn mb-2', 'text' => '<i class="fas fa-trash mx-1"></i>' . trans('site.datatable.delete_all')],
            ])
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, trans('site.datatable.all')]],
            ])
            ->initComplete(
                "function () {
                    this.api().columns([1, 2, 3]).every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    });
                }"
            )
            ->language(translate());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'check',
                'data' => 'check',
                'title' => '<input type="checkbox" class="check-all">',
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false
            ],
            [
                'name' => 'id',
                'data' => 'id',
                'title' => trans('site.id')
            ],
            [
                'name' => 'username',
                'data' => 'username',
                'title' => trans('site.username')
            ],
            [
                'name' => 'email',
                'data' => 'email',
                'title' => trans('site.email')
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => trans('site.created_at')
            ],
            [
                'name' => 'edit',
                'data' => 'edit',
                'title' => trans('site.edit'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false
            ],
            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => trans('site.delete'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false
            ],
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
