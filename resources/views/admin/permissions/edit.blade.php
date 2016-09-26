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
                <div class="panel-heading">{{ trans('startup.pages.admin_permissions.edit_permission') }}
                    <div class="pull-right">
                        <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-times-circle"></i> {{ trans('startup.delete') }}</button>                  
                    </div>
                </div>

                <div class="panel-body">
                    
                {!! Form::model($permission, ['method' => 'put','route' => ['permissions.update', $permission->id], 'class' => 'form-horizontal']) !!}                    

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">{{ trans('startup.name') }}</label>
                        <div class="col-sm-6">
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
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

<!-- Modal Delete Permission-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('startup.pages.admin_permissions.delete_permission') }}</h4>
      </div>
      <div class="modal-body">
            {{ trans('startup.pages.admin_permissions.delete_confirm') }}
      </div>
      
      <div class="modal-footer">
                		{!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id]]) !!}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.yes') }}</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> {{ trans('startup.cancel') }}</button>
                        {!! Form::close() !!}          
      </div>
    </div>
  </div>
</div>
@endsection
