@extends ('backend.layouts.app')

@section ('title', trans('product::labels.backend.product.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('product::labels.backend.product.management') }}
        <small>{{ trans('product::labels.backend.product.management') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('product::labels.backend.product.management') }}</h3>

            <div class="box-tools pull-right">
                @include('product::partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="product-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('product::labels.backend.product.table.id') }}</th>
                            <th>{{ trans('product::labels.backend.product.table.name') }}</th>
                            <th>{{ trans('product::labels.backend.product.table.code_no') }}</th>
                            <th>{{ trans('product::labels.backend.product.table.price') }}</th>
                            <th>{{ trans('product::labels.backend.product.table.manufacture_date') }}</th>
                            <th>{{ trans('product::labels.backend.product.table.expired_date') }}</th>
                            <th>{{ trans('product::labels.backend.product.table.created') }}</th>
                            <th>{{ trans('product::labels.backend.product.table.last_updated') }}</th>
                            <th>{{ trans('product::labels.backend.product.table.status') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function() {
            $('#product-table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.product.get") }}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'code_no', name: 'code_no'},
                    {data: 'price', name: 'price'},
                    {data: 'manufacture_date', name: 'manufacture_date'},
                    {data: 'expired_date', name: 'expired_date'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'status', name: 'status'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop