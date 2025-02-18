<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;

class AdminController extends Controller
{
    public function showDoctors(Request $request)
{
    $search = $request->input('search');
    $editDoctor = null;

    // Nếu có yêu cầu sửa bác sĩ
    if ($request->has('edit_id')) {
        $editDoctor = Doctor::find($request->input('edit_id'));
    }

    // Lọc danh sách bác sĩ theo từ khóa tìm kiếm
    $doctors = Doctor::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%")
                     ->orWhere('specialty', 'like', "%{$search}%");
    })->get();

    return view('role.adminfixdoctors', compact('doctors', 'search', 'editDoctor'));
}


public function storeDoctor(Request $request)
{
    // Validate dữ liệu từ form
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:doctors|unique:users', // Email phải unique cả trong bảng doctors và users
        'password' => 'required|string|min:6',
        'specialty' => 'required|string',
        'phone' => 'required|string',
        'bio' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Xử lý ảnh (nếu có)
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('img'), $imageName);
        $imagePath = 'img/' . $imageName;
    }

    // Thêm bác sĩ vào bảng doctors
    $doctor = Doctor::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Mã hóa mật khẩu
        'specialty' => $request->specialty,
        'phone' => $request->phone,
        'bio' => $request->bio,
        'image' => $imagePath,
    ]);

    // Thêm tài khoản vào bảng users
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Mã hóa mật khẩu
        'role' => 'doctor', // Vai trò là bác sĩ
    ]);

    // Chuyển hướng kèm thông báo thành công
    return redirect()->route('admin.doctors.index')->with('success', 'Bác sĩ đã được thêm thành công và có thể đăng nhập.');
}


public function updateDoctor(Request $request, $id)
{
    // Lấy thông tin bác sĩ cần sửa
    $doctor = Doctor::findOrFail($id);

    // Validate dữ liệu từ form
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:doctors,email,' . $doctor->id,
        'specialty' => 'required|string',
        'phone' => 'required|string',
        'bio' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Xử lý ảnh (nếu có)
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($doctor->image && file_exists(public_path($doctor->image))) {
            unlink(public_path($doctor->image));
        }
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('img'), $imageName);
        $doctor->image = 'img/' . $imageName;
    }

    // Cập nhật thông tin bác sĩ
    $doctor->update($request->all());

    // Chuyển hướng về danh sách bác sĩ kèm thông báo
    return redirect()->route('admin.doctors.index')->with('success', 'Thông tin bác sĩ đã được cập nhật.');
}


public function destroyDoctor($id)
{
    // Tìm bác sĩ với ID
    $doctor = Doctor::findOrFail($id);

    // Tìm user liên kết với bác sĩ dựa trên email
    $user = User::where('email', $doctor->email)->first();

    // Xóa bác sĩ trong bảng doctors
    $doctor->delete();

    // Xóa user trong bảng users nếu tồn tại
    if ($user) {
        $user->delete();
    }

    // Chuyển hướng kèm thông báo
    return redirect()->route('admin.doctors.index')->with('success', 'Bác sĩ và tài khoản liên kết đã được xóa thành công.');
}

    public function showAllPatients()
{
    // Lấy danh sách tất cả bệnh nhân đã đặt lịch với bất kỳ bác sĩ nào
    $patients = Appointment::with(['patient', 'doctor'])
        ->orderBy('appointment_date', 'ASC') // Sắp xếp theo ngày khám gần nhất
        ->get();

    return view('role.adminpatients', compact('patients'));
}


    public function showAppointments()
    {
        $appointments = Appointment::with(['doctor'])->get();
        return view('role.manageappointments', compact('appointments'));
    }

    public function approveAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Lịch hẹn đã được duyệt.');
    }

    public function rejectAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Lịch hẹn đã bị từ chối.');
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with('success', 'Lịch hẹn đã được xóa.');
    }
}