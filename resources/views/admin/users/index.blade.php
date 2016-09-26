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
                <div class="panel-heading">{{ trans('startup.pages.admin_users.title') }}</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('startup.pages.admin_users.profile_photo') }}</th>
                                    <th>{{ trans('startup.name') }}</th>
                                    <th>{{ trans('startup.activated') }}</th>
                                    <th>{{ trans('startup.status') }}(<a href="#" data-toggle="tooltip" title="{!! trans('startup.pages.admin_users.status_text') !!}">?</a>)</th>
                                    <th>{{ trans('startup.role') }}</th>
                                    <th>{{ trans('startup.created') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td><img src="/uploads/avatars/{{ $user->profile_photo }}" width="30" height="30" class="img-circle"></td>
                                    <td><a href="/admin/users/{{ $user->id }}/edit">{{ $user->name }}</a></td>
                                    <td>
                                    @if ($user->activated === 1)
                                        <label class="label label-success">{{ trans('startup.yes') }}</label>
                                    @else
                                        <label class="label label-danger">{{ trans('startup.no') }}</label>
                                    @endif
                                    </td>
                                    <th>
                                        @if($user->isOnline())
                                           <label class="label label-success">{{ trans('startup.online') }}</label>
                                        @else
                                        <label class="label label-danger">{{ trans('startup.offline') }}</label>
                                        @endif
                                    </th>
                                    <td>
                                    @foreach($user->roles as $v)
                                        <label class="label label-primary">{{ $v->name }}</label>
                                    @endforeach    
                                    </td>
                                    <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                    <div class="pull-right">
                    {{ $users->links() }}
                    </div>
                    <!-- Create User modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      <i class="fa fa-plus-circle"></i> {{ trans('startup.pages.admin_users.create_user') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create User-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('startup.pages.admin_users.create_user') }}</h4>
      </div>
      <div class="modal-body">
                  {!! Form::open(array('route' => 'users.store','method'=>'POST', 'class' => 'form-horizontal')) !!}
	
 
                 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                         <label for="name" class="col-sm-3 control-label">{{ trans('startup.name') }}</label>
                         <div class="col-sm-8">
                     {!! Form::text('name', null, array('class' => 'form-control')) !!}
                             @if ($errors->has('name'))
                                 <span class="help-block">{{ $errors->first('name') }}</span>
                             @endif  
                         </div>    
                 </div>
 
                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                         <label for="email" class="col-sm-3 control-label">{{ trans('startup.email') }}</label>
                         <div class="col-sm-8">
                     {!! Form::text('email', null, array('class' => 'form-control')) !!}
                             @if ($errors->has('email'))
                                 <span class="help-block">{{ $errors->first('email') }}</span>
                             @endif 
                         </div>    
                 </div>
  
                  <div class="form-group">
                         <label for="password" class="col-sm-3 control-label">{{ trans('startup.password') }}</label>
                             <div class="col-sm-8">
                              {!! Form::password('password', array('class' => 'form-control')) !!}
                             </div>
                 </div>
 
                  <div class="form-group">
                         <label for="password_confirm" class="col-sm-3 control-label">{{ trans('startup.password_confirm') }}</label>
                             <div class="col-sm-8">
                     {!! Form::password('password_confirm', array('class' => 'form-control')) !!}
                             </div>
                 </div>            
                     
                 <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                         <label for="roles" class="col-sm-3 control-label">{{ trans('startup.roles') }}</label>
                             <div class="col-sm-8">
                         {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                             @if ($errors->has('roles'))
                                 <span class="help-block">{{ $errors->first('roles') }}</span>
                             @endif                    
                             </div>
                 </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.pages.admin_users.create_user') }}</button>          
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> {{ trans('startup.close') }}</button>
        
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</div>

@endsection
