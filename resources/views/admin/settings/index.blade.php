@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.partials.alerts') 
        </div>
        
        @include('admin.layouts.partials.nav')
       
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.pages.admin_settings.settings') }}
                    <div class="pull-right">
                         <small>
                             <code><?php echo $_SERVER['HTTP_HOST'] ?></code> 
                             <code><?php echo $_SERVER['REMOTE_ADDR'] ?></code>
                         </small>
                    </div>                  
                </div>

                <div class="panel-body">

                @include('admin.layouts.partials.settings_nav')

                </div>      
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.pages.admin_settings.global') }}(<a href="#" data-toggle="tooltip" title="{!! trans('startup.pages.admin_settings.settings_text') !!}">?</a>)</div>

                <div class="panel-body">
                    
                {!! Form::model($config, ['method' => 'put','route' => ['settings.updateSettings'], 'class' => 'form-horizontal']) !!}   

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label">{{ trans('startup.pages.admin_settings.title') }}</label>
                            <div class="col-sm-6">
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif  
                            </div>    
                    </div>
    
                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-sm-3 control-label">{{ trans('startup.pages.admin_settings.url') }}</label>
                            <div class="col-sm-6">
                        {!! Form::text('url', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('url'))
                                    <span class="help-block">{{ $errors->first('url') }}</span>
                                @endif  
                            </div>    
                    </div>

                    <div class="form-group{{ $errors->has('timezone') ? ' has-error' : '' }}">
                            <label for="timezone" class="col-sm-3 control-label">{{ trans('startup.pages.admin_settings.timezone') }}</label>
                            <div class="col-sm-6">
                        {!! Form::text('timezone', null, array('class' => 'form-control')) !!}
                                @if ($errors->has('timezone'))
                                    <span class="help-block">{{ $errors->first('timezone') }}</span>
                                @endif  
                            </div>    
                    </div>
  
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.update') }}</button>
                            </div>
                          </div>    
                    </div>
                   
                 {!! Form::close() !!}  

            </div>
        </div>
    </div>
</div>
@endsection
