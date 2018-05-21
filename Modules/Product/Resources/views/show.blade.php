@extends ('backend.layouts.app')

@section ('title', trans('product::labels.backend.product.management'))

@section('after-styles')

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
            <h3 class="box-title">{{ $product->name.'\'s '.trans('product::labels.backend.product.management') }}</h3>

            <div class="box-tools pull-right">
                @include('product::partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-striped table-hover">

                <tr>
                    <th>{{ trans('product::labels.backend.product.table.name') }}</th>
                    <td>{{ $product->name }} </td>
                </tr>                
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.code_no') }}</th>
                    <td>{{ $product->code_no }} </td>
                </tr>
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.price') }}</th>
                    <td>{{ $product->price }} </td>
                </tr>
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.manufacture_date') }}</th>
                    <td>{{ $product->manufacture_date }} </td>
                </tr>
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.expired_date') }}</th>
                    <td>{{ $product->expired_date }} </td>
                </tr>
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.ingredients') }}</th>
                    <td>{{ $product->ingredients }} </td>
                </tr>
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.description') }}</th>
                    <td>{{ $product->description }} </td>
                </tr>
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.status') }}</th>
                    <td>{!! ($product->status) ? '<label class="label label-success">Active</label>' : 
                        '<label class="label label-danger">Inactive</label>' !!} </td>
                </tr>
            </table>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
<script>


</script>
@stop