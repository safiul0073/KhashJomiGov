<?php

namespace App\Http\Controllers;

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

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6',
            'phone' => 'required|string|min:9',
            'role_id' => 'required|integer',
            'avater' => 'nullable|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10000',
            'sign' => 'nullable|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10000',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        if ($request->hasFile('avater')) {
            if ($user->avater && File::exists(public_path($user->avater))) {
                File::delete(public_path($user->avater));
            }
            $avaterfullName = $this->service->fileExequtes($request->file('avater'));
        } else {
            $avaterfullName = 'default.png';
        }

        if ($request->hasFile('sign')) {
            if ($user->sign && File::exists(public_path($user->sign))) {
                File::delete(public_path($user->sign));
            }
            $sign = $this->service->fileExequtes($request->file('sign'));
        }else {
            $sign = null;
        }

        $user->avater = $avaterfullName;
        $user->sign = $sign;
        $user->save();

        if (!$user) return redirect()->back()->with('error', 'Unable to update user');
        return redirect()->back()->with('success', 'User updated successfully');
    }


    public function destroy(User $user)
    {
        $user->delete();
        if (!$user) return redirect()->back()->with('error', 'Unable to delete user');
        return redirect()->back()->with('success', 'User deleted successfully');
    }


}
