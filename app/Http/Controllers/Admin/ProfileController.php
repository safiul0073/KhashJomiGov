<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index ($id) {

        $user = User::findOrFail($id);
        return view('admin.contents.profile.index', compact('user'));
    }

    public function update (Request $request, $id) {

        $user = User::findOrFail($id);
        if (!$user) return redirect()->back()->with('error', 'Unable to find user');

        $params = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
            'phone' => 'nullable|max:255',
            'avater' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sign' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->phone = $params['phone'];
        $service = new FileService();
        if ($request->hasFile('avater')) {
            if ($user->avater && File::exists(public_path($user->avater))) {
                File::delete(public_path($user->avater));
            }
            $user->avater = $service->fileExequtes($request->file('avater'));
        }
        if ($request->hasFile('sign')) {
            if ($user->sign && File::exists(public_path($user->sign))) {
                File::delete(public_path($user->sign));
            }
            $user->sign = $service->fileExequtes($request->file('sign'));
        }

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $s = $user->save();
        if (!$s) return redirect()->back()->with('error', 'Unable to update user');
        return redirect()->back()->with('success', 'Profile updated successfully');

    }
}

