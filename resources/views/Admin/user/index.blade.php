@extends('Admin.layouts.app')

@section('title', 'Dashboard Page')

@section('content')
    @include('Admin.partials.header', [
            'level1' => 'Danh sách người dùng',
            'route1' => '/admin/user/index',
            ])
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title">Danh sách người dùng</div>
            <a href="{{ route('admin.user.add') }}" class="btn btn-success">
                        <span class="btn-label">
                          <i class="fa fa-plus"></i>
                        </span>
                Thêm user
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center low">#</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Tên người dùng</th>
                    <th class="text-center">Vai trò</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu" style="">
                                    <li>
                                        <a class="dropdown-item btn"
                                           href="{{ route('admin.user.edit', $user->id) }}">
                                            <i class="fal fa-edit me-2"></i> Sửa
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item btn removeUser" data-id="{{ $user->id }}">
                                            <i class="fas fa-trash me-2"></i>
                                            Xóa
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal remove -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
         aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Xóa mà không thể khôi phục. Bạn có chắc ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
    </script>
@endsection
