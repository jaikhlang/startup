<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
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
     * Show the application admin users page.
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all()->pluck('name', 'name');

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the application admin users edit page.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all()->pluck('name', 'name');
        $rolesUser = $user->roles()->pluck('name', 'name')->toArray();

        return view('admin.users.edit', compact('user', 'roles', 'rolesUser'));
    }

    /**
     * Store new user.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirm',
            'roles'    => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ((array) $request->input('roles') as $role) {
            $user->assignRole($role);
        }
        activity()->log("User <b>{$user->name}</b> has been created");

        return redirect('admin/users')->with('success', trans('startup.notifications.admin_users.created'));
    }

    /**
     * Update users.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$id,
            'password' => 'same:password_confirm',
            'roles'    => 'required',
        ]);

        $input = $request->all();
        if (! empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, ['password']);
        }

        $user = User::find($id);

        activity()->log("User <b>{$user->name}</b> has been updated");

        DB::table('user_has_roles')->where('user_id', $id)->delete();

        foreach ((array) $request->input('roles') as $role) {
            $user->assignRole($role);
        }

        $user->update($input);

        return redirect('admin/users')->with('info', trans('startup.notifications.admin_users.updated'));
    }

    /**
     * Delete users.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        User::find($id)->delete();
        activity()->log("User <b>{$user->name}</b> has been deleted");

        return redirect('admin/users')->with('info', trans('startup.notifications.admin_users.deleted'));
    }
}
