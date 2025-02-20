<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;

class AdminController extends Controller
{
    // Hiển thị danh sách bác sĩ với tìm kiếm
    public function showDoctors(Request $request)
    {
        $search = $request->input('search');
        $editDoctor = null;

        if ($request->has('edit_id')) {
            $editDoctor = Doctor::find($request->input('edit_id'));
        }

        $doctors = Doctor::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('specialty', 'like', "%{$search}%");
        })->get();

        return view('role.adminfixdoctors', compact('doctors', 'search', 'editDoctor'));
    }

    // Thêm bác sĩ
    public function storeDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors|unique:users',
            'password' => 'required|string|min:6',
            'specialty' => 'required|string',
            'phone' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
        }

        $doctor = Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'specialty' => $request->specialty,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'image' => $imagePath,
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'doctor',
        ]);

        return redirect()->route('admin.doctors.index')->with('success', 'Bác sĩ đã được thêm thành công.');
    }

    // Cập nhật thông tin bác sĩ
    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:appointments,email,' . $appointment->id,
            'phone' => 'required|string',
            'age' => 'required|integer',
            'cccd' => 'required|string|unique:appointments,cccd,' . $appointment->id,
            'appointment_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $appointment->update($request->all());

        return redirect()->route('admin.appointments.index')->with('success', 'Lịch hẹn đã được cập nhật.');
    }


    // Xóa bác sĩ
    public function destroyDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $user = User::where('email', $doctor->email)->first();

        $doctor->delete();
        if ($user) {
            $user->delete();
        }

        return redirect()->route('admin.doctors.index')->with('success', 'Bác sĩ và tài khoản liên kết đã được xóa.');
    }

    // Hiển thị danh sách bệnh nhân
    public function showAllPatients(Request $request)
    {
        $search = $request->input('search');
        $editPatient = null;

        if ($request->has('edit_id')) {
            $editPatient = Patient::find($request->input('edit_id'));
        }

        $patients = Patient::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%");
        })->get();

        return view('role.adminpatients', compact('patients', 'editPatient', 'search'));
    }

    // Thêm bệnh nhân
    public function storePatient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients',
            'phone' => 'required|string',
            'age' => 'required|integer',
            'cccd' => 'required|string|unique:patients',
        ]);

        Patient::create($request->all());

        return redirect()->route('admin.patients.index')->with('success', 'Bệnh nhân đã được thêm thành công.');
    }

    // Cập nhật thông tin bệnh nhân
    public function updatePatient(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'phone' => 'required|string',
            'age' => 'required|integer',
            'cccd' => 'required|string|unique:patients,cccd,' . $patient->id,
        ]);

        $patient->update($request->all());

        return redirect()->route('admin.patients.index')->with('success', 'Thông tin bệnh nhân đã được cập nhật.');
    }

    // Xóa bệnh nhân
    public function destroyPatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('admin.patients.index')->with('success', 'Bệnh nhân đã bị xóa.');
    }

    // Hiển thị danh sách lịch hẹn
    public function showAppointments(Request $request)
    {
        $search = $request->input('search');
        $editAppointment = null;

        if ($request->has('edit_id')) {
            $editAppointment = Appointment::find($request->input('edit_id'));
        }

        $appointments = Appointment::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%");
        })->get();

        return view('role.manageappointments', compact('appointments', 'editAppointment', 'search'));
    }

    // Xử lý duyệt hoặc từ chối lịch hẹn
    public function approveAppointment($id)
    {
        Appointment::findOrFail($id)->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Lịch hẹn đã được duyệt.');
    }

    public function rejectAppointment($id)
    {
        Appointment::findOrFail($id)->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Lịch hẹn đã bị từ chối.');
    }

    // Xóa lịch hẹn
    public function deleteAppointment($id)
    {
        Appointment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Lịch hẹn đã được xóa.');
    }
}