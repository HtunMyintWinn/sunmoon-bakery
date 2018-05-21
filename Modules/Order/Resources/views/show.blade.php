@extends ('backend.layouts.app')

@section ('title', trans('order::labels.backend.order.management'))

@section('after-styles')

@stop

@section('page-header')
    <h1>
        {{ trans('order::labels.backend.order.management') }}
        <small>{{ trans('order::labels.backend.order.management') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $order->id.'\'s '.trans('order::labels.backend.order.management') }}</h3>

            <div class="box-tools pull-right">
                @include('order::partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            


        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
<script>


</script>
@stop