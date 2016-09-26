<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use App\Services\UploadsManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Activitylog\Models\Activity;

class UploadController extends Controller
{
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);

        return view('admin.upload.index', $data);
    }

    public function createFolder(UploadNewFolderRequest $request)
    {
        $new_folder = $request->get('new_folder');
        $folder = $request->get('folder').'/'.$new_folder;

        $result = $this->manager->createDirectory($folder);

        if ($result === true) {
            activity()->log("New folder <b>{$new_folder}</b> created");

            return redirect()
          ->back()
          ->withSuccess("Folder '$new_folder' created.");
        }

        $error = $result ?: 'An error occurred creating directory.';

        return redirect()
        ->back()
        ->withErrors([$error]);
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

    public function uploadFile(UploadFileRequest $request)
    {
        $file = $_FILES['file'];
        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];
        $path = str_finish($request->get('folder'), '/').$fileName;
        $content = File::get($file['tmp_name']);

        $result = $this->manager->saveFile($path, $content);

        if ($result === true) {
            activity()->log("New file <b>{$fileName}</b> uploaded");

            return redirect()
          ->back()
          ->withSuccess("File '$fileName' uploaded.");
        }

        $error = $result ?: 'An error occurred uploading file.';

        return redirect()
        ->back()
        ->withErrors([$error]);
    }
}
