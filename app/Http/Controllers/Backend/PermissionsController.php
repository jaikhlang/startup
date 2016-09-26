<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);

        return view('admin.permissions.index', compact('permissions'));
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = new Permission();
        $permission->name = $request->input('name');
        activity()->log("Permission <b>{$permission->name}</b> has been created");
        $permission->save();

        return redirect('admin/permissions')->with('info', trans('startup.notifications.admin_permissions.created'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        activity()->log("Permission <b>{$permission->name}</b> has been updated");
        $permission->save();

        return redirect('admin/permissions')->with('info', trans('startup.notifications.admin_permissions.updated'));
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        Permission::find($id)->delete();
        activity()->log("Permission <b>{$permission->name}</b> has been deleted");

        return redirect('admin/permissions')->with('info', trans('startup.notifications.admin_permissions.deleted'));
    }
}
