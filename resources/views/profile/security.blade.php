@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            @include('layouts.partials.alerts') 
	
        </div>
        
        @include('layouts.partials.nav')
        
        <div class="col-md-9">
            
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.password') }}</div>

                <div class="panel-body">
                    
                {!! Form::open(['url' => 'profile/updatepassword', 'method' => 'post', 'class' => 'form-horizontal'], Auth::user()->id) !!}
                
                {!! csrf_field() !!}
                
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-sm-3 control-label">{{ trans('startup.password_current') }}</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" id="password" name="password" placeholder="********">
                             @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                      </div>

					   <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                        <label for="new_password" class="col-sm-3 control-label">{{ trans('startup.password_new') }}</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" id="new_password" name="new_password" placeholder="********">
                             @if ($errors->has('new_password'))
                                <span class="help-block">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                      </div>
					  
                      <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                        <label for="new_password" class="col-sm-3 control-label">{{ trans('startup.password_confirm_new') }}</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="********">
                             @if ($errors->has('new_password_confirmation'))
                                <span class="help-block">{{ $errors->first('new_password_confirmation') }}</span>
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
 
            <div class="panel panel-default">
                <div class="panel-heading">Authy</div>

                <div class="panel-body">
                              
                   @if($twofactor_enabled)

                        <form method="POST" action="{{url('auth/two-factor')}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-xs-3"></div>
                                <div class="col-xs-6"><br>
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('startup.pages.profile.authy_disable') }}</button>
                                </div>
                                <div class="col-xs-3"></div>
                            </div>
                        </form>
                    @else
                    
                     <div class="alert alert-info" role-"alert">
                         {!! trans('startup.pages.profile.authy_message') !!}
                    </div>
                    
                <form method="POST" action="{{url('auth/two-factor')}}" class="form-horizontal">
                    {{csrf_field()}}
                    
                    <div class="form-group{{ $errors->has('country-code') ? ' has-error' : '' }}">
                        <label for="password" class="col-sm-3 control-label">{{ trans('startup.pages.profile.country') }}</label>
                        <div class="col-sm-6">
                            <select id="authy-countries" name="country-code" class="form-control"></select>
                            @if ($errors->has('country-code'))
                                <span class="help-block">{{ $errors->first('country-code') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('authy-cellphone') ? ' has-error' : '' }}">
                         <label for="password" class="col-sm-3 control-label">{{ trans('startup.pages.profile.cellphone') }}</label>
                        <div class="col-sm-6">
                            <input id="authy-cellphone" type="text" value="" name="authy-cellphone" class="form-control" />
                             @if ($errors->has('authy-cellphone'))
                                <span class="help-block">{{ $errors->first('authy-cellphone') }}</span>
                            @endif                            
                        </div>
                     </div>   
   
                    <div class="form-group">
                         <label for="password" class="col-sm-3 control-label">{{ trans('startup.pages.profile.authy_sms') }}</label>
                        <div class="col-sm-6">
                            <input type="checkbox" name="send_sms" />
                        </div>
                     </div>  
                     
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.save') }}</button>
                        </div>
                      </div>                      
       
                </form>
            
                    @endif  
                    </div>
                    </div>
                    </div>
        </div>
        
    </div>
@endsection
