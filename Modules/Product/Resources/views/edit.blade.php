@extends ('backend.layouts.app')

@section ('title', trans('product::labels.backend.product.management') . ' | ' . trans('product::labels.backend.product.edit'))

@section('after-styles')

@stop

@section('page-header')
    <h1>
        {{ trans('product::labels.backend.product.management') }}
        <small>{{ trans('product::labels.backend.product.edit') }}</small>
    </h1>
@endsection

@section('content')
    
    {{ Form::model($product, ['route' => ['admin.product.update', $product], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-product']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('product::labels.backend.product.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('product::partials.header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">

                <div class="form-group">
                    {{ Form::label('name', trans('product::labels.backend.product.table.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('product::labels.backend.product.table.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('price', trans('product::labels.backend.product.table.price'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => trans('product::labels.backend.product.table.price')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('description', trans('product::labels.backend.product.table.description'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('product::labels.backend.product.table.description')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('ingredients', trans('product::labels.backend.product.table.ingredients'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('ingredients', null, ['class' => 'form-control', 'placeholder' => trans('product::labels.backend.product.table.ingredients')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('manufacture_date', trans('product::labels.backend.product.table.manufacture_date'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('manufacture_date', null, ['class' => 'form-control date', 'placeholder' => trans('product::labels.backend.product.table.manufacture_date')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('expired_date', trans('product::labels.backend.product.table.expired_date'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('expired_date', null, ['class' => 'form-control date', 'placeholder' => trans('product::labels.backend.product.table.expired_date')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('product::labels.backend.product.table.status'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::checkbox('status', 1, null, ['class' => 'form-control bootstrap-toggle']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.product.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.edit'), ['class' => 'btn btn-success']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')

<script>


</script>
@stop