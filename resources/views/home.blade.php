@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2">

                @include('layouts.partials.alerts') 
            
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.pages.home.dashboard') }}

                </div>

                <div class="panel-body">
                    <p>{{ trans('startup.pages.home.welcome') }}</p>
                    
                    @hasrole('User')
                    <hr>
                    <p>
                    {{ trans('startup.pages.home.read_role_user') }}</b>    
                    </p>
                    @endrole
                    
                    @hasrole('Moderator')
                    <hr>
                    <p>
                    {{ trans('startup.pages.home.read_role_moderator') }}   
                    </p>
                    @endrole  
                    
                    @hasrole('Administrator')
                    <hr>
                    <p>
                    {{ trans('startup.pages.home.read_role_administrator') }} 
                    </p>
                    @endrole                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
