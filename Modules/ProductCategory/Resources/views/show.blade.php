@extends ('backend.layouts.app')

@section ('title', trans('productcategory::labels.backend.productcategory.management'))

@section('after-styles')

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
            <h3 class="box-title">{{ $productcategory->name.'\'s '.trans('productcategory::labels.backend.productcategory.management') }}</h3>

            <div class="box-tools pull-right">
                @include('productcategory::partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.name') }}</th>
                    <td>{{ $productcategory->name }} </td>
                </tr>                
                <tr>
                    <th>{{ trans('product::labels.backend.product.table.description') }}</th>
                    <td>{{ $productcategory->description }} </td>
                </tr>
            </table>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
<script>


</script>
@stop