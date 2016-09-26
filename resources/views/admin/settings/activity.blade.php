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
                <div class="panel-heading">{{ trans('startup.pages.admin_settings.settings') }}</div>

                <div class="panel-body">

                    @include('admin.layouts.partials.settings_nav')

                </div>      
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.pages.admin_activity.activity_log') }}</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('startup.time') }}</th>
                                    <th>{{ trans('startup.pages.admin_activity.activity') }}</th>
                                    <th>{{ trans('startup.pages.admin_activity.who') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($activitys))
                                
                                    @foreach ($activitys as $activity)
                                 <tr>
                                    <td>{{ $activity->updated_at->format('d-m-Y H:i') }}</td>                
                                    <td>{!! $activity->description !!}</td> 
                                    <td>@if(is_null($activity->causer))
                                    Register form
                                     @else
                                     <a href="/admin/users/{{ $activity->causer->id }}/edit">{{ $activity->causer->name }}</a>
                                    @endif</td>
                                </tr>
                                    @endforeach
                                @else
                                You dont have any activitys yet
                                @endif
                            </tbody>
                        </table>
                        </div>  
                        {{ $activitys->links() }}
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
