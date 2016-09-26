<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class SettingsController extends Controller
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
        $config = new \Larapack\ConfigWriter\Repository('app');

        return view('admin.settings.index', compact('config'));
    }

    public function updateSettings(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'url'      => 'required',
            'timezone' => 'required',
        ]);

        $config = $request->all();

        $config = new \Larapack\ConfigWriter\Repository('app');
        $config->set('name', $request->input('name'));
        $config->set('url', $request->input('url'));
        $config->set('timezone', $request->input('timezone'));
        $config->save();

        activity()->log('<b>Global</b> settings has been updated');

        return redirect('admin/settings')->with('success', trans('startup.notifications.admin_settings.updated'));
    }

    public function activity()
    {
        $activitys = Activity::orderBy('updated_at', 'desc')->paginate(11);

        return view('admin.settings.activity', compact('activitys'));
    }
}
