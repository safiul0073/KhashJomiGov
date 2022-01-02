<?php

namespace App\Http\Controllers;

use App\Models\PreviusUser;
use App\Models\Role;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    protected $service;

    public function __construct(FileService $service)
    {
        $this->service = $service;
        $this->authorizeResource(User::class,'user');
    }
    public function index()
    {
        
        $users = User::with('role')->get();
        $roles = Role::all();

        return view('admin.contents.users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|min:9',
            'role_id' => 'required|integer',
            'avater' => 'nullable|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10000',
            'sign' => 'nullable|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10000',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        if ($request->hasFile('avater')) {
            $avaterfullName = $this->service->fileExequtes($request->file('avater'));
        } else {
            $avaterfullName = 'default.png';
        }

        if ($request->hasFile('sign')) {
            $sign = $this->service->fileExequtes($request->file('sign'));
        }else {
            $sign = null;
        }

        $user->avater = $avaterfullName;
        $user->sign = $sign;
        $user->save();
        if (!$user) return redirect()->back()->with('error', 'Unable to create user');
        return redirect()->back()->with('success', 'User created successfully');
    }

    public function show ($id)
    {
        $user = User::with('role')->findOrFail($id);
        return view('admin.contents.users.show', compact('user'));
    }


    public function update(Request $request, User $user)
    {

        $params = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|string|min:9',
            'role_id' => 'required|integer',
            'avater' => 'nullable|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10000',
            'sign' => 'nullable|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10000',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
        ]);

        if($request->password) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('avater')) {
            $avaterfullName = $this->service->fileExequtes($request->file('avater'));
            $user->avater = $avaterfullName;
        }

        if ($request->hasFile('sign')) {
            $sign = $this->service->fileExequtes($request->file('sign'));
            $user->sign = $sign;
        }

        $user->save();
        if (!$user) return redirect()->back()->with('error', 'Unable to update user');
        return redirect()->back()->with('success', 'User updated successfully');
    }




    public function destroy(User $user)
    {
        $app_ids= array();
        $id = 0;
        foreach ($user->app_sends() as $app_id) {
            if($id != $app_id->bondobosto_app_id) {
                $app_ids[] = $app_id->bondobosto_app_id;
                $id = $app_id->bondobosto_app_id;
            }
        }
        PreviusUser::create([
            'name' => $user->name,
            'email' => $user->email,
            'role_id' => $user->role_id,
            'app_ids' => implode(',', $app_ids)
        ]);
        $user->delete();
        if (!$user) return redirect()->back()->with('error', 'Unable to delete user');
        return redirect()->back()->with('success', 'User deleted successfully');
    }


}
