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
                <div class="panel-heading">{{ trans('startup.pages.admin_roles.edit_role')  }}
                    <div class="pull-right">
                        <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-times-circle"></i> {{ trans('startup.delete')  }}</button>                  
                    </div>                
                </div>

                <div class="panel-body">
                    
                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id], 'class' => 'form-horizontal']) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">{{ trans('startup.name')  }}</label>
                        <div class="col-sm-6">
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif  
                        </div>    
                </div>

                <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                    <label for="permission" class="col-sm-3 control-label">{{ trans('startup.permissions')  }}</label>
                        <div class="col-sm-6">
                           @foreach($permission as $value)
                            	<label>{{ Form::checkbox('permission[]', $value->name, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name ')) }}
                            	{{ $value->name }}</label>
                            	<br/>
                            @endforeach
                            @if ($errors->has('permission'))
                                <span class="help-block">{{ $errors->first('permission') }}</span>
                            @endif  
                        </div>    
                </div>
                
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.update')  }}</button>
                        </div>
                      </div>    
                
                {!! Form::close() !!}
                
                </div>               
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete User-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('startup.pages.admin_roles.delete_role')  }}</h4>
      </div>
      <div class="modal-body">
            {{ trans('startup.pages.admin_roles.delete_confirm')  }}
      </div>
      
      <div class="modal-footer">
                		{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id]]) !!}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.yes') }}</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> {{ trans('startup.cancel')  }}</button>
                        {!! Form::close() !!}          
      </div>
    </div>
  </div>
</div>
@endsection
