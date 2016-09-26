<?php

namespace App\Http\Controllers\Backend;

use App\Backup;
use App\Http\Controllers\Controller;
use App\Services\BackupManager;
use Artisan;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class BackupController extends Controller
{
    protected $manager;

    public function __construct(BackupManager $manager)
    {
        $this->manager = $manager;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);

        return view('admin.settings.backup', $data);
    }

    public function store()
    {
        Artisan::call('backup:run', []);

        activity()->log('New backup has been created');

        return redirect('admin/settings/backup')->with('info', trans('startup.notifications.admin_backup.created'));
    }

    public function deleteFile(Request $request)
    {
        $del_file = $request->get('del_file');
        $path = $request->get('folder').'/'.$del_file;

        $result = $this->manager->deleteFile($path);

        if ($result === true) {
            activity()->log("File <b>{$del_file}</b> deleted");

            return redirect()
          ->back()
          ->withSuccess("File '$del_file' deleted.");
        }

        $error = $result ?: 'An error occurred deleting file.';

        return redirect()
        ->back()
        ->withErrors([$error]);
    }

    public function deleteFolder(Request $request)
    {
        $del_folder = $request->get('del_folder');
        $folder = $request->get('folder').'/'.$del_folder;

        $result = $this->manager->deleteDirectory($folder);

        if ($result === true) {
            activity()->log("Folder <b>{$del_folder}</b> deleted");

            return redirect()
          ->back()
          ->withSuccess("Folder '$del_folder' deleted.");
        }

        $error = $result ?: 'An error occurred deleting directory.';

        return redirect()
        ->back()
        ->withErrors([$error]);
    }
}
