@extends ('backend.layouts.app')

@section ('title', trans('shop::labels.backend.shop.management'))

@section('after-styles')

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
            <h3 class="box-title">{{ $shop->id.'\'s '.trans('shop::labels.backend.shop.management') }}</h3>

            <div class="box-tools pull-right">
                @include('shop::partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column">
                <thead>
                    <tr>
                      <th>{{ trans('blockdate::labels.backend.block_date.table.id') }}</th>
                      <th>{{ trans('blockdate::labels.backend.block_date.table.start_date') }}</th>
                      <th>{{ trans('blockdate::labels.backend.block_date.table.end_date') }}</th>
                      <th>{{ trans('blockdate::labels.backend.block_date.table.action') }}</th>
                    </tr>
                </thead>
            </table>
            
                <div style="width: 500px; height: 500px;">
    {!! Mapper::render() !!}
</div>

        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
<script>


</script>
@stop