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
                <div class="panel-heading"><b>{{ $thread->subject }}</b>
                <div class="pull-right">
                    <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-times-circle"></i> {{ trans('startup.pages.profile.delete_message') }}</button>                    
                </div>
                </div>
                
                <div class="panel-body">

                @foreach($thread->messages as $message)
                    <div class="media">
                        <a class="pull-left">
                            <img src="/uploads/avatars/{{ $message->user->profile_photo }}" width="50" height="50" alt="{{ $message->user->name }}" class="img-circle">                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">{{ $message->user->name }}<div class="text-muted pull-right"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div></h5>
                            <p><?php echo Parsedown::instance()->text($message->body) ?></p>
                        </div>
                    </div>
                    <hr>
                @endforeach

            {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
            <!-- Message Form Input -->
            <div class="form-group">
                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                    <textarea class="form-control" placeholder="{{ trans('startup.pages.profile.enter_message') }}" id="summernote" name="message" cols="50" rows="10"></textarea>
                        @if ($errors->has('message'))
                            <span class="help-block">{{ $errors->first('message') }}</span>
                        @endif                   
                </div>
            </div>

                <!-- Submit Form Input -->
                <div class="form-group">
                    <input class="btn btn-primary form-control" type="submit" value="{{ trans('startup.pages.profile.send') }}">
                </div>
                {!! Form::close() !!}
                
            </div>
    
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
        <h4 class="modal-title" id="myModalLabel">{{ trans('startup.pages.profile.delete_message') }}</h4>
      </div>
      <div class="modal-body">
           {{ trans('startup.pages.profile.confirm_delete') }}
      </div>
      
      <div class="modal-footer">
        {!! Form::open(['method' => 'DELETE','route' => ['messages.destroy', $thread->id]]) !!}
            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.yes') }}</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> {{ trans('startup.no') }}</button>
        {!! Form::close() !!}          
      </div>
    </div>
  </div>
</div>

@push('scripts')
        <script> var simplemde = new SimpleMDE(); </script>  
@endpush

@stop