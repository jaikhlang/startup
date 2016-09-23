@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2">

                @include('layouts.partials.alerts') 
            
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.pages.contact.title') }}

                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'contact', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                    
                    {!! csrf_field() !!}
                      
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">{{ trans('startup.name') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="name" name="name" value="@if (Auth::user()) {{ Auth::user()->name }} @else {{ old('name') }} @endif">
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif                       
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-sm-3 control-label">{{ trans('startup.email') }}</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="email" name="email" value="@if (Auth::user()) {{ Auth::user()->email }} @else {{ old('email') }} @endif">
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                      </div> 

                      <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="subject" class="col-sm-3 control-label">{{ trans('startup.pages.contact.subject') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}">
                            @if ($errors->has('subject'))
                                <span class="help-block">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                      </div>  

                      <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="message" class="col-sm-3 control-label">{{ trans('startup.pages.contact.message') }}</label>
                        <div class="col-sm-8">
                          <textarea class="form-control" rows="8" id="summernote" name="message">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="help-block">{{ $errors->first('message') }}</span>
                            @endif                       
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-envelope" aria-hidden="true"></i> {{ trans('startup.pages.contact.send') }}</button>
                        </div>
                      </div>                 
                    {!! Form::close() !!}
                      
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
