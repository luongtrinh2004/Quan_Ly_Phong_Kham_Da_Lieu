@extends('layouts.app')

@section('title', 'Quản Lý Dịch Vụ')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Quản Lý Dịch Vụ</h2>
    <a href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addServiceModal">Thêm Dịch Vụ</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên Dịch Vụ</th>
                <th>Hình Ảnh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>
                    <img src="{{ asset($service->image) }}" width="100"
                        onerror="this.onerror=null; this.src='{{ asset('img/default.jpg') }}';">
                </td>
                <td>
                    <!-- Nút sửa -->
                    <a href="#" class="btn btn-warning edit-btn" data-id="{{ $service->id }}"
                        data-name="{{ $service->name }}" data-image="{{ $service->image }}" data-bs-toggle="modal"
                        data-bs-target="#editServiceModal">Sửa</a>

                    <!-- Nút xóa -->
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bạn có chắc chắn?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Thêm Dịch Vụ -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm Dịch Vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên Dịch Vụ</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Chọn Hình Ảnh</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sửa Dịch Vụ -->
<div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh Sửa Dịch Vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editServiceForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="service_id" id="editServiceId">
                    <div class="mb-3">
                        <label class="form-label">Tên Dịch Vụ</label>
                        <input type="text" name="name" id="editServiceName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hình Ảnh</label>
                        <input type="file" name="image" class="form-control">
                        <img id="editServiceImagePreview" src="" width="100" class="mt-2">
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Xử lý khi nhấn nút "Sửa"
    document.querySelectorAll(".edit-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            let id = this.getAttribute("data-id");
            let name = this.getAttribute("data-name");
            let image = this.getAttribute("data-image");

            document.getElementById("editServiceId").value = id;
            document.getElementById("editServiceName").value = name;
            document.getElementById("editServiceForm").action = `/services/${id}/update`;

            let imgPreview = document.getElementById("editServiceImagePreview");
            imgPreview.src = image ? `/${image}` : "/img/default.jpg";
        });
    });
});
</script>

@endsection