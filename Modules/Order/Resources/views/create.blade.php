@extends ('backend.layouts.app')

@section ('title', trans('order::labels.backend.order.management') . ' | ' . trans('order::labels.backend.order.create'))

@section('after-styles')
{{ Html::style("plugin/bootstrap-select/bootstrap-select.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('order::labels.backend.order.management') }}
        <small>{{ trans('order::labels.backend.order.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.order.store', 'class' => 'form-horizontal', 'files' => true ,'role' => 'form', 'method' => 'post', 'id' => 'create-order']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('order::labels.backend.order.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('order::partials.header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                 <div class="form-group">
                    {{ Form::label('product_id', trans('order::labels.backend.order.table.product_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('product_id', $all_products, ['class' => 'selectpicker form-control', 'placeholder' => trans('order::labels.backend.order.table.product_id')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('quantity', trans('order::labels.backend.order.table.quantity'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => trans('order::labels.backend.order.table.quantity')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('name', trans('order::labels.backend.order.table.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('order::labels.backend.order.table.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 <div class="form-group">
                    {{ Form::label('phone_number', trans('order::labels.backend.order.table.phone_number'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => trans('order::labels.backend.order.table.phone_number')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('email', trans('order::labels.backend.order.table.email'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('order::labels.backend.order.table.email')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('address', trans('order::labels.backend.order.table.address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => trans('order::labels.backend.order.table.address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('delivery_address', trans('order::labels.backend.order.table.delivery_address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('delivery_address', null, ['class' => 'form-control', 'placeholder' => trans('order::labels.backend.order.table.delivery_address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('service_fee', trans('order::labels.backend.order.table.service_fee'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('service_fee', null, ['class' => 'form-control', 'placeholder' => trans('order::labels.backend.order.table.service_fee')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('delivery_fee', trans('order::labels.backend.order.table.delivery_fee'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('delivery_fee', null, ['class' => 'form-control', 'placeholder' => trans('order::labels.backend.order.table.delivery_fee')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.order.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop
@section('after-scripts')
{{ Html::script("plugin/bootstrap-select/bootstrap-select.min.js") }}
<script>
$('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4,
});
</script>
@stop