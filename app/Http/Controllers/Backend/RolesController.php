<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
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
        $permission = Permission::get();
        $roles = Role::paginate(10);

        return view('admin.roles.index', compact('roles', 'permission'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->toArray();

        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'       => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        activity()->log("Role <b>{$role->name}</b> has been updated");
        $role->save();

        DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->givePermissionTo($value);
        }

        return redirect('admin/roles')->with('info', trans('startup.notifications.admin_roles.updated'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        activity()->log("Role <b>{$role->name}</b> has been created");
        $role->save();

        foreach ($request->input('permission') as $key => $value) {
            $role->givePermissionTo($value);
        }

        return redirect('admin/roles')->with('info', trans('startup.notifications.admin_roles.created'));
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        activity()->log("Role <b>{$role->name}</b> has been deleted");
        DB::table('roles')->where('id', $id)->delete();

        return redirect('admin/roles')->with('info', trans('startup.notifications.admin_roles.deleted'));
    }
}
