@extends('Admin.layouts.app')

@section('content')
    @include('Admin.partials.header', [
'level1' => 'Danh sách người dùng',
'level2' => 'Sửa người dùng',
'route1' => '/admin/user/index',
'route2' => '/admin/user/edit/'. $user->id
])
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Chỉnh sửa người dùng</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="fw-bold" for="name">Tên <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Tên"
                                               value="{{ old('name', $user->name) }}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="fw-bold" for="username">Username <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username"
                                               placeholder="Tên người dùng"
                                               value="{{ old('username', $user->username) }}">
                                        @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="fw-bold" for="password">Mật khẩu <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password"
                                               placeholder="Mật khẩu">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="fw-bold" for="password_confirmation">Xác nhận mật khẩu <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               placeholder="Xác nhận mật khẩu">
                                        @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="fw-bold" for="role">Vai trò <span class="text-danger">*</span></label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option
                                            value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
