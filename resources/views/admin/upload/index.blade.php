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
                <div class="panel-heading">{{ trans('startup.pages.admin_uploads.title') }}
                    <div class="pull-right">
                        
                            <button type="button" class="btn btn-success btn-xs"
                                    data-toggle="modal" data-target="#modal-folder-create">
                              <i class="fa fa-plus-circle"></i> {{ trans('startup.pages.admin_uploads.new_folder') }}
                            </button>
                            <button type="button" class="btn btn-primary btn-xs"
                                    data-toggle="modal" data-target="#modal-file-upload">
                              <i class="fa fa-upload"></i> {{ trans('startup.pages.admin_uploads.upload') }}
                            </button>    
                        
                    </div>                
                </div>

                <div class="panel-body">
                  <ul class="breadcrumb">
                    @foreach ($breadcrumbs as $path => $disp)
                      <li><a href="/admin/upload?folder={{ $path }}">{{ $disp }}</a></li>
                    @endforeach
                    <li class="active">{{ $folderName }}</li>
                  </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.pages.admin_uploads.title') }}(<a href="#" data-toggle="tooltip" title="{!! trans('startup.pages.admin_uploads.uploads_message') !!}">?</a>)</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>{{ trans('startup.name') }}</th>
                              <th>{{ trans('startup.type') }}</th>
                              <th>{{ trans('startup.date') }}</th>
                              <th>{{ trans('startup.size') }}</th>
                              <th data-sortable="false">{{ trans('startup.action') }}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($subfolders as $path => $name)
                              <tr>
                                <td>
                                  <a href="/admin/upload?folder={{ $path }}">
                                    <i class="fa fa-folder fa-lg fa-fw"></i>
                                    {{ $name }}
                                  </a>
                                </td>
                                <td>{{ trans('startup.folder') }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                  <button type="button" class="btn btn-xs btn-danger"
                                          onclick="delete_folder('{{ $name }}')">
                                    <i class="fa fa-times-circle"></i>
                                  </button>
                                </td>
                              </tr>
                            @endforeach
                            @foreach ($files as $file)
                              <tr>
                                <td>
                                  <a href="{{ $file['webPath'] }}">
                                    @if (is_image($file['mimeType']))
                                      <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                                    @else
                                      <i class="fa fa-file-o fa-lg fa-fw"></i>
                                    @endif
                                    {{ $file['name'] }}
                                  </a>
                                </td>
                                <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                                <td>{{ $file['modified']->format('d-m-Y H:i') }}</td>
                                <td>{{ human_filesize($file['size']) }}</td>
                                <td>
                                  <button type="button" class="btn btn-xs btn-danger"
                                          onclick="delete_file('{{ $file['name'] }}')">
                                    <i class="fa fa-times-circle"></i>
                                  </button>
                                  @if (is_image($file['mimeType']))
                                    <button type="button" class="btn btn-xs btn-success"
                                            onclick="preview_image('{{ $file['webPath'] }}')">
                                      <i class="fa fa-eye"></i>
                                    </button>
                                  @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
  @include('admin.upload.modals.createfile')
  @include('admin.upload.modals.createfolder')
  @include('admin.upload.modals.deletefile')
  @include('admin.upload.modals.deletefolder')
  @include('admin.upload.modals.viewimage')

@stop

@section('scripts')

@include('admin.upload.partials.js')

@stop