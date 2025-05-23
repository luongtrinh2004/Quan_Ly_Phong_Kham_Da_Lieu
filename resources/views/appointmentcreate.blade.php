@extends('layouts.app')

@section('title', 'Đặt lịch khám')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4">Đặt Lịch Khám</h1>



        <form method="POST" action="{{ route('appointments.store') }}">
            @csrf

            <!-- Select Specialty -->
            <div class="row mb-3">
                <label for="specialty" class="col-sm-2 col-form-label">Dịch Vụ</label>
                <div class="col-sm-10">
                    <select name="specialty" id="specialty" class="form-control" required>
                        <option value="">-- Chọn Dịch Vụ --</option>
                        @foreach($specialties as $specialty)
                            <option value="{{ $specialty }}">{{ $specialty }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Select Doctor -->
            <div class="row mb-3">
                <label for="doctor_id" class="col-sm-2 col-form-label">Chọn Bác Sĩ</label>
                <div class="col-sm-10">
                    <select name="doctor_id" id="doctor_id" class="form-control" required>
                        <option value="">-- Chọn mục Dịch Vụ trước --</option>
                    </select>
                </div>
            </div>

            <!-- Patient Details -->
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Tên bệnh nhân</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="age" class="col-sm-2 col-form-label">Tuổi</label>
                <div class="col-sm-10">
                    <input type="number" name="age" id="age" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="cccd" class="col-sm-2 col-form-label">CCCD</label>
                <div class="col-sm-10">
                    <input type="text" name="cccd" id="cccd" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="appointment_date" class="col-sm-2 col-form-label">Ngày hẹn</label>
                <div class="col-sm-10">
                    <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="shift" class="col-sm-2 col-form-label">Chọn Ca Làm Việc</label>
                <div class="col-sm-10">
                    <select name="shift" id="shift" class="form-control" required>
                        <option value="">-- Vui lòng chọn ngày trước --</option>
                        @if(isset($editAppointment))
                            <option value="morning" {{ $editAppointment->shift == 'morning' ? 'selected' : '' }}>08:00 - 12:00
                            </option>
                            <option value="afternoon" {{ $editAppointment->shift == 'afternoon' ? 'selected' : '' }}>14:00 -
                                18:00</option>
                        @endif
                    </select>
                </div>

            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#appointment_date').change(function () {
                        var selectedDate = $(this).val();
                        var doctorId = $('#doctor_id').val();
                        $('#shift').html('<option value="">-- Đang tải ca làm việc... --</option>');

                        if (selectedDate && doctorId) {
                            $.ajax({
                                url: '/get-working-hours',
                                type: 'GET',
                                data: {
                                    doctor_id: doctorId,
                                    date: selectedDate
                                },
                                success: function (data) {
                                    $('#shift').html(
                                        '<option value="">-- Chọn Ca Làm Việc --</option>');
                                    if (data.morning || data.afternoon) {
                                        if (data.morning) {
                                            $('#shift').append(
                                                '<option value="morning">08:00 - 12:00</option>'
                                            );
                                        }
                                        if (data.afternoon) {
                                            $('#shift').append(
                                                '<option value="afternoon">14:00 - 18:00</option>'
                                            );
                                        }
                                    } else {
                                        $('#shift').html(
                                            '<option value="">-- Không có ca làm việc --</option>'
                                        );
                                    }
                                },
                                error: function () {
                                    $('#shift').html(
                                        '<option value="">-- Lỗi khi tải dữ liệu --</option>');
                                }
                            });
                        } else {
                            $('#shift').html('<option value="">-- Vui lòng chọn ngày trước --</option>');
                        }
                    });
                });
            </script>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-10">
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Đặt lịch</button>
        </form>
    </div>

    <script>
        document.getElementById('specialty').addEventListener('change', function () {
            var specialty = this.value;
            var doctorSelect = document.getElementById('doctor_id');
            doctorSelect.innerHTML = '<option value="">-- Đang tải danh sách bác sĩ... --</option>';

            fetch('/get-doctors/' + specialty)
                .then(response => response.json())
                .then(data => {
                    doctorSelect.innerHTML = '<option value="">-- Chọn bác sĩ --</option>';
                    data.forEach(doctor => {
                        doctorSelect.innerHTML += `<option value="${doctor.id}">${doctor.name}</option>`;
                    });
                });
        });
    </script>

@endsection