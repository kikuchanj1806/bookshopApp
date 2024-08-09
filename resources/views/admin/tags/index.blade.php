@extends('admin.layouts.app')

@section('title', 'Tags Page')

@section('content')
    @include('admin.partials.header', [
            'level1' => 'Danh sách Tags',
            'route1' => '/admin/tags/index',
            ])
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title">Danh sách Tags</div>
            <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTagModal">
    <span class="btn-label">
        <i class="fa fa-plus"></i>
    </span>
                Thêm tag
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center low">#</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên</th>
                    <th class="text-start">Loại</th>
                    <th class="text-center">Thời gian tạo</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $t)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($tags->currentPage() - 1) * $tags->perPage() }}</td>
                        <td class="text-center">{{ $t->id }}</td>
                        <td>{{ $t->name }}</td>
                        <td>
                            {{ $t->type == \App\Models\Tag::TYPE_CLASS ? 'Lớp học' : 'Môn học' }}
                        </td>
                        <td class="text-center">{{ $t->created_at ? $t->created_at->format('d/m/Y H:i:s') : '' }}</td>
                        <td class="text-center">
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item btn" onclick="openEditModal('{{ $t->id }}', '{{ $t->name }}', '{{ $t->type }}')"><i class="fal fa-edit me-2"></i> Sửa</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item btn">
                                            <form action="{{ route('admin.tags.destroy', $t->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item p-0">
                                                    <i class="fas fa-trash-alt me-2"></i> Xóa
                                                </button>
                                            </form>
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

    <!-- Modal Thêm Tag -->
    <div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagModalLabel">Thêm Tag Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.tags.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tagName">Tên Tag</label>
                            <input type="text" name="name" id="tagName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Loại Tag</label>
                            <select class="form-control" id="type" name="type">
                                <option value="{{ \App\Models\Tag::TYPE_CLASS }}">Lớp học</option>
                                <option value="{{ \App\Models\Tag::TYPE_SUBJECT }}">Môn học</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Sửa Tag -->
    <div class="modal fade" id="editTagModal" tabindex="-1" role="dialog"
         aria-labelledby="editTagModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editTagForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editTagId">
                        <div class="form-group">
                            <label for="editTagName">Tên tag</label>
                            <input type="text" class="form-control" id="editTagName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Loại Tag</label>
                            <select class="form-control" id="editTagType" name="type">
                                <option value="{{ \App\Models\Tag::TYPE_CLASS }}">Lớp học</option>
                                <option value="{{ \App\Models\Tag::TYPE_SUBJECT }}">Môn học</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(id, name, type) {
            $('#editTagId').val(id);
            $('#editTagName').val(name);
            $('#editTagType').val(type); // Set giá trị type trong select box
            $('#editTagForm').attr('action', '{{ route("admin.tags.update", ":id") }}'.replace(':id', id));
            $('#editTagModal').modal('show');
        }

        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
    </script>
@endsection
