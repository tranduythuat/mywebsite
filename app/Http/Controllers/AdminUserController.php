<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(UserAddRequest $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
    
            $rolesId = $request->role_id;
    
            $user->roles()->attach($rolesId);
            
            DB::commit();

            return redirect()->route('users.index');
           
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('message: ' . $exception->getMessage() . '--Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $roleOfUser = $user->roles;
        // dd($roleOfUser);
        return view('admin.user.edit', compact('roles', 'user', 'roleOfUser'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            // dd($request->role_id);
            DB::commit();
            return redirect()->route('users.index')->with('success', 'Cập nhật thành công user!');
            
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('message: ' . $exception->getMessage() . '--Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success',
                'user_id' => $id
            ], 200);
        } catch (\Exception $exception) {
            Log::error('error:' . $exception->getMessage() . '---Line:'. $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Delete fail'
            ], 500);
        }
    }
}
