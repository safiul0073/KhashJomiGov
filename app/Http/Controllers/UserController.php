<?php

namespace App\Http\Controllers;

use App\Models\PreviusUser;
use App\Models\Role;
use App\Models\UpaZila;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    protected $service;

    public function __construct(FileService $service)
    {
        $this->service = $service;
        $this->authorizeResource(User::class,'user');
    }
    public function index(Request $request)
    {
        $tab = null;
        $role_query = Role::query();
         if (User::$DC == auth()->user()->role_id) {
            $tab = null;
            $tab = $request->tab;
            if ($tab === null) {
                $tab = 1;
            }
            $upazilas = UpaZila::latest()->get();
            $users = User::with('role')->where('upa_zila_id', $tab)->where('union_id', null)->where('status', 1)->get();
            $user2 = User::with('role')->where('upa_zila_id', null)->where('status', 1)->get();
            $roles = Role::all();
            $users = $user2->merge($users);
            $roles = $role_query->where('id', '!=', User::$TOWSHILDER)->get();
            return view('admin.contents.dc-manage.index', compact('users', 'roles', 'upazilas','tab'));
         }

        $user=auth()->user();
        $role_id =  User::$TOWSHILDER;
        if ($request->tab == 'former')  { // showing former user if tab has value like former
            $users = $user->upazila->users->where('status', 0);
        }else{
            $users = $user->upazila->users->where('status', 1);
        }

        $unions = $user->upazila->unions;
        $upa_zila_id = $user->upa_zila_id;

        return view('admin.contents.users.index', compact('users', 'unions','role_id','upa_zila_id'));
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

        DB::beginTransaction();
        try {
            if(auth()->user()->role_id == User::$DC){
                $user = User::where('upa_zila_id', $request->upa_zila_id)->where('role_id', $request->role_id)->where('status', 1)->first();
                if ($user) return redirect()->back()->with('error', 'User already exists');
            }else {
                $user = User::where('role_id', $request->role_id)->where('union_id', $request->union_id)->where('status', 1)->first();
                if ($user) return redirect()->back()->with('error', 'User already exists');
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id,
                'upa_zila_id' => $request->upa_zila_id,
                'union_id' => $request->union_id? $request->union_id : null,
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
            DB::commit();
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
        return redirect()->back()->with('success', 'User created successfully');
    }

    public function show (User $user)
    {

        return view('admin.contents.users.show', compact('user'));
    }


    public function update(Request $request, User $user)
    {

        $params = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|min:9',
            'role_id' => 'required|integer',
            'avater' => 'nullable|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10000',
            'sign' => 'nullable|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:10000',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'upa_zila_id' => $request->upa_zila_id,
            'union_id' => $request->union_id? $request->union_id : null,
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
        $user->status = 0;
        $u= $user->save();
        if (!$u) return redirect()->back()->with('error', 'Unable to send in former');
        // $app_ids= array();
        // $id = 0;
        // foreach ($user->app_sends() as $app_id) {
        //     if($id != $app_id->bondobosto_app_id) {
        //         $app_ids[] = $app_id->bondobosto_app_id;
        //         $id = $app_id->bondobosto_app_id;
        //     }
        // }
        // PreviusUser::create([
        //     'name' => $user->name,
        //     'email' => $user->email,
        //     'role_id' => $user->role_id,
        //     'app_ids' => implode(',', $app_ids)
        // ]);
        // $user->delete();
        // if (!$user) return redirect()->back()->with('error', 'Unable to delete user');
        return redirect()->back()->with('success', 'User Fomer Send success');
    }


}
