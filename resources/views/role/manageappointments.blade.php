@extends('layouts.app')

@section('title', 'Quản lý Lịch Hẹn')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif;">Quản lý Lịch Hẹn</h1>

        <!-- Tìm kiếm lịch hẹn -->
        <form method="GET" action="{{ route('admin.appointments.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm lịch hẹn..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Form thêm hoặc sửa lịch hẹn -->
        @if(isset($editAppointment))
            <h3 class="mb-3">Chỉnh Sửa Lịch Hẹn</h3>
            <form method="POST" action="{{ route('admin.appointments.update', $editAppointment->id) }}" class="mb-4">
                @csrf
                @method('POST')
                <!-- Dùng POST thay vì PUT -->
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <input type="text" name="name" class="form-control" value="{{ $editAppointment->name }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="email" name="email" class="form-control" value="{{ $editAppointment->email }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="phone" class="form-control" value="{{ $editAppointment->phone }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" name="age" class="form-control" value="{{ $editAppointment->age }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="cccd" class="form-control" value="{{ $editAppointment->cccd }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="date" name="appointment_date" class="form-control"
                            value="{{ $editAppointment->appointment_date }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="description" class="form-control" value="{{ $editAppointment->description }}">
                    </div>
                    <div class="col-md-3 mb-2">
                        <button type="submit" class="btn btn-warning w-100">Lưu Thay Đổi</button>
                    </div>
                </div>
            </form>
        @else
            <h3 class="mb-3">Thêm Lịch Hẹn</h3>
            <form method="POST" action="{{ route('admin.appointments.store') }}" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <input type="text" name="name" class="form-control" placeholder="Tên bệnh nhân" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" name="age" class="form-control" placeholder="Tuổi" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="cccd" class="form-control" placeholder="Căn Cước Công Dân" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="date" name="appointment_date" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="description" class="form-control" placeholder="Ghi chú">
                    </div>
                    <div class="col-md-3 mb-2">
                        <button type="submit" class="btn btn-success w-100">Thêm Lịch Hẹn</button>
                    </div>
                </div>
            </form>
        @endif

        <!-- Danh sách lịch hẹn -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bác Sĩ</th>
                    <th>Bệnh Nhân</th>
                    <th>Email</th>
                    <th>Điện Thoại</th>
                    <th>Tuổi</th>
                    <th>CCCD</th>
                    <th>Mô Tả</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ optional($appointment->doctor)->name ?? 'Không xác định' }}</td>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->email }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ $appointment->age }}</td>
                        <td>{{ $appointment->cccd }}</td>
                        <td>{{ $appointment->description }}</td>
                        <td>
                            @if($appointment->status === 'pending')
                                <span class="badge bg-warning">Chờ duyệt</span>
                            @elseif($appointment->status === 'approved')
                                <span class="badge bg-success">Đã duyệt</span>
                            @else
                                <span class="badge bg-danger">Đã từ chối</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('admin.appointments.index', ['edit_id' => $appointment->id]) }}"
                                class="btn btn-warning btn-sm">Sửa</a>
                            <form method="POST" action="{{ route('admin.appointments.approve', $appointment->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                            </form>
                            <form method="POST" action="{{ route('admin.appointments.reject', $appointment->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning btn-sm">Từ chối</button>
                            </form>
                            <form method="POST" action="{{ route('admin.appointments.destroy', $appointment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa lịch hẹn này?')">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection