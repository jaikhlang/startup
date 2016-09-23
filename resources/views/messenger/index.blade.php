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
                <div class="panel-heading">{{ trans('startup.pages.profile.messages') }}</div>
                
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('startup.pages.profile.name') }}</th>
                                    <th>{{ trans('startup.pages.profile.message') }}</th>
                                    <th>{{ trans('startup.pages.profile.new_replies') }}</th>
                                    <th>{{ trans('startup.pages.profile.last_reply') }}</th>
                                </tr>
                            </thead>                            
                            <tbody>
                            @if($threads->count() > 0)
                                @foreach($threads as $thread) 
                                    <tr>
                                        <td>{{ $thread->participantsString(Auth::id()) }}</td>
                                        <td>{!! link_to('profile/messages/' . $thread->id, $thread->subject) !!} <small><?php echo Parsedown::instance()->text($thread->latestMessage->body) ?></small></td>
                                        <td>
                                            @if ($thread->userUnreadMessagesCount(Auth::id()))
                                            <span class="label label-danger">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</label>
                                            @else
                                           <span class="label label-default">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</label>
                                            @endif
                                        </td>
                                        <td>{{ $thread->latestMessage->updated_at->diffFOrHumans() }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <p>{{ trans('startup.pages.profile.no_message') }}</p>
                            @endif                               
                            </tbody>
                        </table>
                    </div> 

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      <i class="fa fa-plus-circle"></i> {{ trans('startup.pages.profile.create_message') }}
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
        <h4 class="modal-title" id="myModalLabel">{{ trans('startup.pages.profile.create_message') }}</h4>
      </div>
      <div class="modal-body">

            {!! Form::open(['route' => 'messages.store']) !!}

                <!-- Subject Form Input -->
                <div class="form-group">
                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="subject" class="control-label">{{ trans('startup.pages.profile.subject') }}</label>
                    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('subject'))
                            <span class="help-block">{{ $errors->first('subject') }}</span>
                        @endif        
                    </div>
                </div>
                
                <!-- Message Form Input -->
                <div class="form-group">
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                     <label for="message" class="control-label">{{ trans('startup.pages.profile.message') }}</label>
                    {!! Form::textarea('message', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
                        @if ($errors->has('message'))
                            <span class="help-block">{{ $errors->first('message') }}</span>
                        @endif          
                    </div>
                </div>
                
                @if($users->count() > 0)  
                <div class="form-group">
                    <div class="form-group{{ $errors->has('recipients') ? ' has-error' : '' }}">
                    <select class="selectpicker form-control" name="recipients" data-live-search="true" title="{{ trans('startup.pages.profile.pick_user') }}">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" data-tokens="{!!$user->email!!}">{!!$user->name!!}</option>
                        @endforeach
                    </select>
                        @if ($errors->has('recipients'))
                            <span class="help-block">{{ $errors->first('recipients') }}</span>
                        @endif           
                    </div> 
                </div>    
                @endif  

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('startup.pages.profile.create_message') }}</button>          
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> {{ trans('startup.cancel') }}</button>
        
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</div>
@stop