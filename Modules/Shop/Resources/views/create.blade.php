@extends ('backend.layouts.app')

@section ('title', trans('shop::labels.backend.shop.management') . ' | ' . trans('shop::labels.backend.shop.create'))

@section('after-styles')
{{ Html::style("plugin/bootstrap-clockpicker/bootstrap-clockpicker.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('shop::labels.backend.shop.management') }}
        <small>{{ trans('shop::labels.backend.shop.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.shop.store', 'class' => 'form-horizontal', 'files' => true ,'role' => 'form', 'method' => 'post', 'id' => 'create-shop']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('shop::labels.backend.shop.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('shop::partials.header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">

                <div class="form-group">
                    {{ Form::label('name', trans('shop::labels.backend.shop.table.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('shop::labels.backend.shop.table.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('address', trans('shop::labels.backend.shop.table.address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => trans('shop::labels.backend.shop.table.address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('opening_hour', trans('shop::labels.backend.shop.table.opening_hour'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('opening_hour', null, ['class' => 'form-control clockpicker', 'placeholder' => trans('shop::labels.backend.shop.table.opening_hour')]) }}
                    </div><!--col-lg-10-->

                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('closing_hour', trans('shop::labels.backend.shop.table.closing_hour'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('closing_hour', null, ['class' => 'form-control clockpicker', 'placeholder' => trans('shop::labels.backend.shop.table.closing_hour')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('description', trans('shop::labels.backend.shop.table.description'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('shop::labels.backend.shop.table.description')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('shop::labels.backend.shop.table.status'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::checkbox('status', 1, null, ['class' => 'form-control bootstrap-toggle']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.shop.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
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
{{ Html::script("plugin/bootstrap-clockpicker/bootstrap-clockpicker.min.js") }}
{{ Html::script("plugin/pushjs-notifications/push.min.js") }}
<script>
 $('.clockpicker').clockpicker({
    autoclose: true,
    'default': 'now'
 }); 

 Push.create("Hello world!", {
    body: "How's it hangin'?",
    icon: 'http://bnfweeklypromotions.com/img/frontend/logo.png',
    timeout: 4000,
    onClick: function () {
        window.location('bnfweeklypromotions.com');
        this.close();
    }
});
</script>
@stop