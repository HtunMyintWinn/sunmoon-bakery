@extends ('backend.layouts.app')

@section ('title', trans('productcategory::labels.backend.productcategory.management') . ' | ' . trans('productcategory::labels.backend.productcategory.edit'))

@section('after-styles')

@stop

@section('page-header')
    <h1>
        {{ trans('productcategory::labels.backend.productcategory.management') }}
        <small>{{ trans('productcategory::labels.backend.productcategory.edit') }}</small>
    </h1>
@endsection

@section('content')
    
    {{ Form::model($productcategory, ['route' => ['admin.productcategory.update', $productcategory], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-productcategory']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('productcategory::labels.backend.productcategory.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('productcategory::partials.header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('productcategory::labels.backend.productcategory.table.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('productcategory::labels.backend.productcategory.table.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('description', trans('productcategory::labels.backend.productcategory.table.description'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('productcategory::labels.backend.productcategory.table.description')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('status', trans('productcategory::labels.backend.productcategory.table.status'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10" style="margin-top: 4px;">
                        {{ Form::checkbox('status','1', ['class' => 'form-control','checked'=> true,'placeholder' => trans('productcategory::labels.backend.productcategory.table.status')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.productcategory.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
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