@extends('layouts.app')

@section('title', 'Quản lý lịch hẹn')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif;">Quản lý Lịch Hẹn</h1>

    @if($appointments->isEmpty())
    <div class="alert alert-info text-center">Hiện tại không có lịch hẹn nào.</div>
    @else
    @php
    $groupedAppointments = $appointments->groupBy(function($appointment) {
    return \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y');
    });
    @endphp

    @foreach($groupedAppointments as $date => $dailyAppointments)
    <div class="card mb-4 shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $date }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
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
                    @foreach($dailyAppointments as $index => $appointment)
                    <tr>
                        <td>{{ $index + 1 }}</td>
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
                            <form method="POST" action="{{ route('admin.appointments.delete', $appointment->id) }}">
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
    </div>
    @endforeach
    @endif
</div>

<!-- CSS giúp bố cục gọn gàng hơn -->
<style>
.card-header {
    font-size: 20px;
    font-weight: 600;
}

.table th {
    background-color: #f8f9fa;
    font-weight: bold;
    text-align: center;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

.btn-sm {
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 5px;
}

.d-flex.gap-2 {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
    justify-content: center;
}
</style>

@endsection