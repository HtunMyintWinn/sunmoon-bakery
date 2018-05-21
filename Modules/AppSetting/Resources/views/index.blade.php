@extends ('backend.layouts.app')

@section ('title', trans('appsetting::labels.backend.appsetting.management'))

@section('after-styles')
    {{ Html::style("datatables/css/jquery.dataTables.min.css") }}
    {{ Html::style("build/jquery-minicolors-master/jquery.minicolors.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('appsetting::labels.backend.appsetting.management') }}
        <small>{{ trans('appsetting::labels.backend.appsetting.management') }}</small>
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('appsetting::labels.backend.appsetting.management') }}</h3>

            <div class="box-tools pull-right">
                @if(access()->allow('restore-app-settings'))
                <div class="actions">
                    <button type="button" id="restore_setting" class="btn red danger">Restore Default Settings</button>
                </div>
                @endif
               
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body form">
            <?php 
                if(old('tab')) $tab=old('tab');
                elseif(isset($_GET['tab'])) $tab=$_GET['tab'];
                else $tab='basic';
                ?>
                <div class="tabbable-line">
                    <ul class="nav nav-tabs nav-tabs-lg">
                        @if(access()->allow('basic-app-settings'))
                        <li class="{{ ($tab=='basic')?'active':'' }}">
                            <a href="#basic" data-toggle="tab"> Basic Setting</a>
                        </li>
                        @endif

                        @if(access()->allow('payment-app-settings'))
                        <li class="{{ ($tab=='payment')?'active':'' }}">
                            <a href="#payment" data-toggle="tab"> Payment Setting</a>
                        </li>
                        @endif

                        @if(access()->allow('email-app-settings'))
                        <li class="{{ ($tab=='email')?'active':'' }}">
                            <a href="#email" data-toggle="tab"> Email Setting
                            </a>
                        </li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        @if(access()->allow('basic-app-settings'))
                        <div class="tab-pane {{ ($tab=='basic')?'active':'' }}" id="basic">
                                {!! Form::open(['route' => 'admin.appsetting.store','files'=> true , 'role' => 'form', 'method' => 'post']) !!}
                                {!! Form::hidden('tab','basic') !!}

                                <div class="form-group form-md-line-input">
                          
                                <label for="app_name" class="col-md-2 control-label">App Theme</label>
                                 <div class="col-md-10">
                                  <select name="app_theme" id="app_theme" class="form-control">
                                     @foreach(config('backend.availiable_themes_list') as $theme)
                                         <option value="{{ $theme }}" {{ ($theme == config('backend.theme'))?'selected':'' }}>{{ ucfirst($theme) }}</option>
                                     @endforeach
                                 </select>
                                 </div>
                                </div><br><br>

                                <div class="form-group {{ $errors->has('main_logo') ? ' has-error' : '' }}">
                                    <label for="MAIN_LOGO" class="control-label col-md-2">App Main Logo</label>
                                 
                                     <div class="col-md-10">
                                        <input type="file" value="{{ config('app.app_setting.main_logo') }}" id="main_logo" name="main_logo" class="form-control"><br>
                                        @if(config('app.app_setting.main_logo'))
                                           <img src="{{ config('app.app_setting.main_logo') }}" class="thumbnail"  style="width: 200px; height: 150px;">
                                        @endif
                                    </div>
                                </div><br><br>
                                  
                            
                                <div class="form-group {{ $errors->has('app_favicon') ? ' has-error' : '' }}">
                                     <br>
                                     <label for="APP_FAVICON" class="control-label col-md-2">App Favicon</label>
                                     <div class="col-md-10">
                                       <input type="file" value="{{ config('app.app_setting.favicon') }}" id="app_favicon" name="app_favicon" class="form-control"><br>
                                        @if(config('app.app_setting.favicon'))
                                        <img src="{{ config('app.app_setting.favicon') }}" class="thumbnail"  style="width: 200px; height: 150px;">
                                        @endif
                                    </div>  
                                </div><br><br>


                                <div class="form-group form-md-line-input">
                                
                                    <label for="app_name" class="col-md-2 control-label">App Name</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.name') }}" id="app_name" name="app_name" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    
                                     <label for="playstore" class="col-md-2 control-label">Google Playstore Link</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.playstore') }}" id="playstore" name="playstore" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    
                                     <label for="appstore" class="col-md-2 control-label">Applestore Link</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.appstore') }}" id="appstore" name="appstore" class="form-control"><br>
                                    </div>
                                </div>


                                <div class="form-group form-md-line-input">
                                
                                     <label for="facebook" class="col-md-2 control-label">Facebook Link</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.facebook') }}" id="facebook" name="facebook" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    
                                     <label for="googleplus" class="col-md-2 control-label">Google Plus Link</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.googleplus') }}" id="googleplus" name="googleplus" class="form-control"><br>
                                    </div>
                                </div>
                                
                                <div class="form-group form-md-line-input">
                                    
                                     <label for="youtube" class="col-md-2 control-label">Youtube Link</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.youtube') }}" id="youtube" name="youtube" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    
                                     <label for="twitter" class="col-md-2 control-label">Twitter Link</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.twitter') }}" id="twitter" name="twitter" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    
                                     <label for="instagram" class="col-md-2 control-label">Instagram Link</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.instagram') }}" id="instagram" name="instagram" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    
                                     <label for="youtubedemo" class="col-md-2 control-label">Youtube Demo Video Link</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.youtubedemo') }}" id="youtubedemo" name="youtubedemo" class="form-control"><br>
                                    </div>
                                </div>

                                 <div class="form-group form-md-line-input">
                                    
                                     <label for="app_email" class="col-md-2 control-label">App Email</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.email') }}" id="app_email" name="app_email" class="form-control"><br>
                                    </div>
                                </div>

                                 <div class="form-group form-md-line-input">
                                    
                                     <label for="app_phone" class="col-md-2 control-label">Emengency Phone No.</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.phone') }}" id="app_phone" name="app_phone" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                               
                                     <label for="app_address" class="col-md-2 control-label">Address</label>
                                    <div class="col-md-10">
                                     <textarea  id="app_address" name="app_address" class="form-control">{{ config('app.app_setting.address') }}</textarea><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                     <label for="date_format" class="col-md-2 control-label">Date Format</label>
                                    <div class="col-md-10">
                                     <select name="date_format" id="date_format" class="form-control">
                                        @foreach(config('app.date_format_list') as $key=>$date_format)
                                         <option value="{{ $key }}" {{ ($key == config('app.app_setting.date_format'))?'selected':'' }}>{{ ucfirst($date_format) }}</option>
                                     @endforeach
                                 </select><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                     <label for="time_format" class="col-md-2 control-label">Time Format</label>
                                    <div class="col-md-10">
                                     <select name="time_format" id="time_format" class="form-control">
                                        @foreach(config('app.time_format_list') as $key=>$time_format)
                                         <option value="{{ $key }}" {{ ($key == config('app.app_setting.time_format'))?'selected':'' }}>{{ ucfirst($time_format) }}</option>
                                     @endforeach
                                 </select><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                     <label for="date_time_format" class="col-md-2 control-label">Date-Time Format</label>
                                    <div class="col-md-10">
                                     <select name="date_time_format" id="date_time_format" class="form-control">
                                        @foreach(config('app.date_time_format_list') as $key=>$date_time_format)
                                         <option value="{{ $key }}" {{ ($key == config('app.app_setting.date_time_format'))?'selected':'' }}>{{ ucfirst($date_time_format) }}</option>
                                     @endforeach
                                 </select><br>
                                    </div>
                                </div>



                                <div class="form-group form-md-line-input">
                                    
                                     <label for="app_tnc" class="col-md-2 control-label">Book Terms & Conditions</label>
                                    <div class="col-md-10">
                                    <textarea id="app_tnc" name="app_tnc" class="form-control">{{ config('app.app_setting.tnc') }}</textarea><br>
                                    </div>
                                </div>

                                 <div class="form-group form-md-line-input">
                                    
                                     <label for="google_map" class="col-md-2 control-label">Google Map API Key</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('app.app_setting.map_key') }}" id="google_map" name="google_map" class="form-control"><br>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success" value="{{ trans('buttons.general.crud.update') }}" ><br>
                                    </div>
                                </div>

                            {!! Form::close() !!}
                          
                        </div> <!-- tab-pane -->
                        @endif

                        @if(access()->allow('payment-app-settings'))
                        <div class="tab-pane {{ ($tab=='payment')?'active':'' }}" id="payment">
                            {!! Form::open(['route' => 'admin.appsetting.store','files'=> true , 'role' => 'form', 'method' => 'post']) !!}
                            {!! Form::hidden('tab','payment') !!}

                                @include('appsetting::includes.ok')

                                <hr>
                                
                                @include('appsetting::includes.paypal')

                                <hr>
                                
                                @include('appsetting::includes.mpu')

                                <hr>
                                
                                @include('appsetting::includes.truemoney')

                                <hr>
                                
                                @include('appsetting::includes.onetwothree')

                                <hr>
                                
                                @include('appsetting::includes.visa_master')

                                <hr>
                                
                                @include('appsetting::includes.mab')                          
                
                                <div class="form-group">
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success" value="{{ trans('buttons.general.crud.update') }}" ><br>
                                    </div>
                                </div>
                              

                            {!! Form::close() !!}
                          
                        </div> <!-- tab-pane -->
                        @endif

                        @if(access()->allow('email-app-settings'))
                        <div class="tab-pane {{ ($tab=='email')?'active':'' }}" id="email">
                            {!! Form::open(['route' => 'admin.appsetting.store','files'=> true , 'role' => 'form', 'method' => 'post']) !!}
                            {!! Form::hidden('tab','email') !!}

                                <div class="caption">
                                     <span class="caption-subject font-dark sbold uppercase">Email</span>
                                </div>

                                <div class="form-group form-md-line-input">                                 
                                <label for="mail_driver" class="col-md-2 control-label">Mail Driver</label>
                                    <div class="col-md-10">
                                    <select name="mail_driver" class="form-control">
                                      @foreach(config('mail.avaliable_drivers') as $driver)
                                     <option value="{{ $driver }}" {{ ($driver == config('mail.driver'))?'selected':'' }}>{{ ucfirst($driver) }}</option>
                                      @endforeach
                                    </select><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">                                 
                                <label for="mail_host" class="col-md-2 control-label">Mail Host</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('mail.host') }}" id="mail_host" name="mail_host" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">                                 
                                <label for="mail_port" class="col-md-2 control-label">Mail Port</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('mail.port') }}" id="mail_port" name="mail_port" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">                                 
                                <label for="mail_username" class="col-md-2 control-label">Mail Username</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('mail.username') }}" id="mail_username" name="mail_username" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">                                 
                                <label for="mail_password" class="col-md-2 control-label">Mail Password</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('mail.password') }}" id="mail_password" name="mail_password" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">                                 
                                <label for="mail_encryption" class="col-md-2 control-label">Mail Encryption</label>
                                    <div class="col-md-10">
                                    <input type="text" value="{{ config('mail.encryption') }}" id="mail_encryption" name="mail_encryption" class="form-control"><br>
                                    </div>
                                </div>
                
                                <div class="form_group">
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success" value="{{ trans('buttons.general.crud.update') }}" ><br>
                                    </div>
                                </div>
                              

                            {!! Form::close() !!}
                          
                        </div> <!-- tab-pane -->
                        @endif
                    </div> <!-- tab-content -->
                </div> <!-- tabble-line -->
            
               
        </div><!-- /.box-body -->
    </div><!--box-->

@stop

@section('after-scripts')

{{ Html::script("datatables/js/jquery.dataTables.min.js") }}
{{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
{{ Html::script("build/jquery-minicolors-master/jquery.minicolors.js") }}

<script type="text/javascript">

     $(document).ready(function() {
        $('demo').minicolors();
        $('.demo').each(function() {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom left',
                change: function(hex, opacity) {
                    if (!hex) return;
                    if (opacity) hex += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(hex);
                    }
                },
                theme: 'bootstrap'
            });

        });

        $('#restore_setting').click(function () {


            swal({
              title: "Are you sure?",
              text: "You are going to restore the default setting of App Setting!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, restore it!",
              cancelButtonText: "No, cancel plx!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                $.ajax({
                                type: 'get',
                                url: '{{ route('admin.appsetting.restore') }}',
                                data: '',
                                success: function (data, textStatus, jQxhr) {
                                    swal("Success", "Successfully restored!)", "success");
                                    location.reload();
                                }
                });
              }
              else {
                swal("Cancelled", "You cancelled the action!)", "error");
              }
            });
        });        
     });
    </script>
@stop