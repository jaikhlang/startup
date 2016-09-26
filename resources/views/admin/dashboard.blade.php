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
                <div class="panel-heading">{{ trans('startup.pages.admin_dashboard.title') }}</div>

                <div class="panel-body">
                   {{ trans('startup.pages.admin_dashboard.welcome') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
