@extends ('backend.layouts.app')

@section ('title', trans('shop::labels.backend.shop.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('shop::labels.backend.shop.management') }}
        <small>{{ trans('shop::labels.backend.shop.management') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('shop::labels.backend.shop.management') }}</h3>

            <div class="box-tools pull-right">
                @include('shop::partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="shop-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('shop::labels.backend.shop.table.id') }}</th>
                            <th>{{ trans('shop::labels.backend.shop.table.name') }}</th>
                            <th>{{ trans('shop::labels.backend.shop.table.address') }}</th>
                            <th>{{ trans('shop::labels.backend.shop.table.opening_hour') }}</th>
                            <th>{{ trans('shop::labels.backend.shop.table.closing_hour') }}</th>
                            <th>{{ trans('shop::labels.backend.shop.table.created') }}</th>
                            <th>{{ trans('shop::labels.backend.shop.table.last_updated') }}</th>
                            <th>{{ trans('shop::labels.backend.shop.table.status') }}</th>
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
            $('#shop-table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.shop.get") }}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name',name: 'name'},
                    {data: 'address', name: 'address'},
                    {data: 'opening_hour', name: 'opening_hour'},
                    {data: 'closing_hour', name: 'closing_hour'},
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