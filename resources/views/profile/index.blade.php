@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            @include('layouts.partials.alerts') 
            @include('errors.errors') 
            
        </div>
        
        @include('layouts.partials.nav')
        
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.pages.profile.profile_photo') }}</div>
                
                <div class="panel-body">
                    <div class="text-center">
                        
                            <img src="/uploads/avatars/{{ Auth::user()->profile_photo }}" width="140" height="140" class="img-rounded" alt="Profile Photo">
                            
                                <hr>
                                
                            {!! Form::open(['url' => 'profile/updatephoto', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true], Auth::user()->id) !!}                             
    
                                <label class="btn btn-primary btn-file">
                                   <i class="fa fa-photo" aria-hidden="true"></i> {{ trans('startup.pages.profile.change_photo') }} <input type="file" name="profile_photo" id="profile_photo" style="display: none;" onchange="this.form.submit()">
                                </label>
    
                            {!! Form::close() !!}
    
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.pages.profile.contact_info') }}</div>

                <div class="panel-body">
                    
                    {!! Form::open(['url' => 'profile/updateprofile', 'method' => 'patch', 'class' => 'form-horizontal'], Auth::user()->id) !!}
                    
                    {!! csrf_field() !!}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">{{ trans('startup.name') }}</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name ?: old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-sm-3 control-label">{{ trans('startup.email') }}</label>
                        <div class="col-sm-6">
                          <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?: old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif                       
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.update') }}</button>
                        </div>
                      </div>                      
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>            
            
        </div>
        
    </div>
</div>
@endsection
