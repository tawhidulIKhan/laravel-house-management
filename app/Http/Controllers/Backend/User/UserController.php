<?php

namespace App\Http\Controllers\Backend\User;

use App\Events\UserRegistered;
use App\Models\Media;
use App\Models\User;
use App\Traits\MediaHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use MediaHandler;

    private $viewPath = "backend/users/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view($this->viewPath.'index', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view($this->viewPath.'create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request,[
            'first_name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        $photo = '';

        if ($request->hasFile('photo')){

           $photo =  $this->storeImage($request, 'photo');

        }

        $user = User::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'token' => str_random(15)
        ]);

        if (isset($photo)){

            $user->update([
                'image_id' => $photo
            ]);

        }

        $user->assignRole($request->role);


        event(new UserRegistered($user));

        session()->flash('type', 'success');
        session()->flash('message', 'User Created Successfully');
        return redirect()->route('user.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view($this->viewPath.'show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        return view($this->viewPath.'edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->update([
            'first_name' => $request->first_name
        ]);

        $newRoles = [];
        array_push($newRoles, $request->role);
        $user->syncRoles($newRoles);

        session()->flash('type', 'success');
        session()->flash('message', 'User updated successfully');

        return redirect()->route('user.edit', $user->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::where('id', $id)->delete();

        return redirect()->route('user.index');
    }

    public function passwordSetRequest($token = null){

        if(!$token){
            return redirect()->route('register');
        }

        $user = User::where('token', $token)->first();

        if(!$user){
            return redirect()->route('register');
        }

        return view($this->viewPath.'/password', compact('user'));

    }

    public function setPassword(Request $request){

        $this->validate($request, [
            'password' => 'required',
            'email' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return redirect()->route('register');
        }

        $user->update([
            'password' => bcrypt($request->password),
            'token' => null
        ]);

        return redirect()->route('login');

    }

}
