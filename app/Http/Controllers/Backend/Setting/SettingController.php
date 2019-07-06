<?php

namespace App\Http\Controllers\Backend\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    private $viewPath = "backend/settings/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->viewPath.'index');
    }

    public function defaultRoles(Request $request){
        $this->validate($request,[
            'default_roles'
        ]);

        if($request->default_roles){
            $roles = config('acl.roles');

            foreach ($roles as $role){
                \Spatie\Permission\Models\Role::create([
                    'name' => $role
                ]);
            }

        }
        return redirect()->route('setting.index');

    }
}
