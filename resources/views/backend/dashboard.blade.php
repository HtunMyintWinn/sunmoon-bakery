@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <!-- {!! trans('strings.backend.welcome') !!} -->
            <?php
                $color = 0;
                $colors = rand_color();
            ?>
                 <!-- Small boxes (Stat box) -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                    <div class="small-box bg-{{ $colors[$color++] }}">
                        <div class="inner">
                          <h3>User</h3>

                          <p>Management</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ url('admin/access/user') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                     <div class="small-box bg-{{ $colors[$color++] }}">
                        <div class="inner">
                          <h3>Role</h3>

                          <p>Management</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-circle-o"></i>
                        </div>
                        <a href="{{ url('admin/access/role') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    @foreach(Module::getOrdered() as $module)
                    @if($module->enabled())
                        <?php 
                            $module = $module->getLowerName();
                            $route = 'admin.'.$module.'.index';
                            $active = 'admin/'.$module.'*';
                            $mod_trans = $module.'::menus.backend.sidebar.'.$module;
                        ?>
                        @if(access()->hasPermission('view-'.$module))
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                              <!-- small box -->
                              <div class="small-box bg-{{ $colors[$color++] }}">
                                <div class="inner">
                                  <h3>{{ ucfirst($module) }}</h3>

                                  <p>Management</p>
                                </div>
                                <div class="icon">
                                  <i class="{{ config($module.'.icon') }}"></i>
                                </div>
                                <a href="{{ route($route) }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                            <!-- ./col -->
                        @endif
                    @endif
                    @endforeach
            <!-- /.row -->
        </div><!-- /.box-body -->
    </div><!--box box-success-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->render() !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection