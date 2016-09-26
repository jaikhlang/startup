@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                   <p>{{ trans('startup.pages.404.404') }} </p>
                   <a href="{{ url('/') }}">{{ trans('startup.pages.404.button') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection