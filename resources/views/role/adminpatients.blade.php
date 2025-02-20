@extends('layouts.app')

@section('title', 'Quản lý Bệnh Nhân')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4">Quản lý Bệnh Nhân</h1>

        <!-- Tìm kiếm bệnh nhân -->
        <form method="GET" action="{{ route('admin.patients.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm bệnh nhân..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Form thêm hoặc sửa bệnh nhân -->
        @if(isset($editPatient))
            <h3 class="mb-3">Chỉnh Sửa Bệnh Nhân</h3>
            <form method="POST" action="{{ route('admin.patients.update', $editPatient->id) }}" class="mb-4">
                @csrf
                @method('POST')
                <!-- Dùng POST thay vì PUT -->
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <input type="text" name="name" class="form-control" value="{{ $editPatient->name }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="email" name="email" class="form-control" value="{{ $editPatient->email }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="phone" class="form-control" value="{{ $editPatient->phone }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" name="age" class="form-control" value="{{ $editPatient->age }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="cccd" class="form-control" value="{{ $editPatient->cccd }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="date" name="appointment_date" class="form-control"
                            value="{{ $editPatient->appointment_date }}" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="description" class="form-control" value="{{ $editPatient->description }}">
                    </div>
                    <div class="col-md-3 mb-2">
                        <button type="submit" class="btn btn-warning w-100">Lưu Thay Đổi</button>
                    </div>
                </div>
            </form>
        @else
            <h3 class="mb-3">Thêm Bệnh Nhân</h3>
            <form method="POST" action="{{ route('admin.patients.store') }}" class="mb-4">
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
                        <button type="submit" class="btn btn-success w-100">Thêm Bệnh Nhân</button>
                    </div>
                </div>
            </form>
        @endif

        <!-- Danh sách bệnh nhân -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Tuổi</th>
                    <th>CCCD</th>
                    <th>Ngày Hẹn</th>
                    <th>Ghi Chú</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->cccd }}</td>
                        <td>{{ $patient->appointment_date }}</td>
                        <td>{{ $patient->description }}</td>
                        <td>
                            <a href="{{ route('admin.patients.index', ['edit_id' => $patient->id]) }}"
                                class="btn btn-warning btn-sm">Sửa</a>
                            <form method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa bệnh nhân này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection