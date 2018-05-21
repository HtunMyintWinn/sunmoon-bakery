@extends ('backend.layouts.app')

@section ('title', trans('productcategory::labels.backend.productcategory.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('productcategory::labels.backend.productcategory.management') }}
        <small>{{ trans('productcategory::labels.backend.productcategory.management') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('productcategory::labels.backend.productcategory.management') }}</h3>

            <div class="box-tools pull-right">
                @include('productcategory::partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="productcategory-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('productcategory::labels.backend.productcategory.table.id') }}</th>
                            <th>{{ trans('productcategory::labels.backend.productcategory.table.name') }}</th>
                            <th>{{ trans('productcategory::labels.backend.productcategory.table.description') }}</th>
                            <th>{{ trans('productcategory::labels.backend.productcategory.table.created') }}</th>
                            <th>{{ trans('productcategory::labels.backend.productcategory.table.last_updated') }}</th>
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
            $('#productcategory-table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.productcategory.get") }}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop