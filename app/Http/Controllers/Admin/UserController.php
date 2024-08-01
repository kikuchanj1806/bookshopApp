<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/', // phải chứa ít nhất một chữ cái viết hoa
                'regex:/[a-z]/', // phải chứa ít nhất một chữ cái viết thường
                'regex:/[0-9]/', // phải chứa ít nhất một chữ số
                'regex:/[@$!%*#?&]/', // phải chứa một ký tự đặc biệt
                'different:username' // phải khác với username
            ],
            'password_confirmation' => 'required|same:password',
            'role' => 'required|in:admin,ctv'
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'username.required' => 'Tên người dùng là bắt buộc.',
            'username.unique' => 'Tên người dùng đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu phải có ít nhất một chữ cái viết hoa, một chữ cái viết thường, một chữ số và một ký tự đặc biệt.',
            'password.different' => 'Mật khẩu không được trùng với tên người dùng.',
            'password_confirmation.required' => 'Xác nhận mật khẩu là bắt buộc.',
            'password_confirmation.same' => 'Xác nhận mật khẩu không khớp.',
            'role.required' => 'Vai trò là bắt buộc.',
            'role.in' => 'Vai trò không hợp lệ.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = ['admin', 'ctv']; // Các vai trò có thể gán
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'role' => 'required|in:admin,ctv'
        ];

        if ($request->filled('password')) {
            $rules['password'] = [
                'nullable',
                'string',
                'min:8',
                'regex:/[A-Z]/', // phải chứa ít nhất một chữ cái viết hoa
                'regex:/[a-z]/', // phải chứa ít nhất một chữ cái viết thường
                'regex:/[0-9]/', // phải chứa ít nhất một chữ số
                'regex:/[@$!%*#?&]/', // phải chứa một ký tự đặc biệt
                'different:username' // phải khác với username
            ];
            $rules['password_confirmation'] = 'nullable|same:password';
        }

        $request->validate($rules, [
            'name.required' => 'Tên là bắt buộc.',
            'username.required' => 'Tên người dùng là bắt buộc.',
            'username.unique' => 'Tên người dùng đã tồn tại.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu phải có ít nhất một chữ cái viết hoa, một chữ cái viết thường, một chữ số và một ký tự đặc biệt.',
            'password.different' => 'Mật khẩu không được trùng với tên người dùng.',
            'password_confirmation.same' => 'Xác nhận mật khẩu không khớp.',
            'role.required' => 'Vai trò là bắt buộc.',
            'role.in' => 'Vai trò không hợp lệ.'
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Người dùng đã được cập nhật thành công.');
    }

    public function destroyUser(Request $request): JsonResponse
    {
        $result = $this->deleteSv($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công banner'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    private function deleteSv(Request $request)
    {
        try {
            $id = (int)$request->input('id');
            $user = User::findOrFail($id);
            $user->delete();
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
}
