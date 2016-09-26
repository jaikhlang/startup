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
                <div class="panel-heading">{{ trans('startup.pages.admin_permissions.title') }}</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('startup.id') }}</th>
                                    <th>{{ trans('startup.name') }}</th>
                                    <th>{{ trans('startup.created') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td><a href="/admin/permissions/{{ $permission->id }}/edit">{{ $permission->name }}</a></td>
                                    <td>{{ $permission->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-right">
                    {{ $permissions->links() }}
                    </div>                    
                    <!-- Create Permission modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      <i class="fa fa-plus-circle"></i> {{ trans('startup.pages.admin_permissions.create_permissions') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Permission-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('startup.pages.admin_permissions.create_permissions') }}</h4>
      </div>
      <div class="modal-body">
          
                  {!! Form::open(array('route' => 'permissions.store','method'=>'POST', 'class' => 'form-horizontal')) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">{{ trans('startup.name') }}</label>
                        <div class="col-sm-6">
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif  
                        </div>    
                </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.pages.admin_permissions.create_permissions') }}</button>          
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> {{ trans('startup.close') }}</button>
        
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</div>
@endsection
