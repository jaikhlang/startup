{{-- Delete File Modal --}}
<div class="modal fade" id="modal-file-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">{{ trans('startup.pages.admin_uploads.delete_file_confirm') }}</h4>
      </div>
      <div class="modal-body">
          {{ trans('startup.pages.admin_uploads.delete_message') }}
          <kbd><span id="delete-file-name1">file</span></kbd>
          {{ trans('startup.pages.admin_uploads.file?') }}
      </div>
      <div class="modal-footer">
        <form method="POST" action="/admin/settings/backup/file">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="folder" value="{{ $folder }}">
          <input type="hidden" name="del_file" id="delete-file-name2">
          <button type="submit" class="btn btn-danger">
            <i class="fa fa-times-circle"></i>  {{ trans('startup.pages.admin_uploads.delete_file') }}
          </button>          
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-close" aria-hidden="true"></i>  {{ trans('startup.cancel') }}
          </button>
        </form>
      </div>
    </div>
  </div>
</div>