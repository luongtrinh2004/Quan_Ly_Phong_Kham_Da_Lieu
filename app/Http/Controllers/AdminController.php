<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;

class AdminController extends Controller
{
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

    public function updateDoctor(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'specialty' => 'required|string',
            'phone' => 'required|string',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($doctor->image && file_exists(public_path($doctor->image))) {
                unlink(public_path($doctor->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imageName);
            $doctor->image = 'img/' . $imageName;
        }

        $doctor->update($request->except(['password']));

        return redirect()->route('admin.doctors.index')->with('success', 'Thông tin bác sĩ đã được cập nhật.');
    }

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

    public function showAllPatients(Request $request)
    {
        $search = $request->input('search');
        $editPatient = null;

        if ($request->has('edit_id')) {
            $editPatient = Appointment::with('patient')->find($request->input('edit_id'));
        }

        $patients = Appointment::with(['patient', 'doctor'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('patient', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->orderBy('appointment_date', 'ASC')
            ->get();

        return view('role.adminpatients', compact('patients', 'editPatient'));
    }

    public function storePatient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients',
            'phone' => 'required|string',
            'age' => 'required|integer',
            'cccd' => 'required|string|unique:patients',
        ]);

        $patient = Patient::create($request->all());

        return redirect()->route('admin.patients.index')->with('success', 'Bệnh nhân đã được thêm thành công.');
    }

    public function updatePatient(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $patient = $appointment->patient;

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

    public function destroyPatient($id)
    {
        $appointment = Appointment::findOrFail($id);
        $patient = $appointment->patient;

        if ($patient) {
            $patient->delete();
        }
        $appointment->delete();

        return redirect()->route('admin.patients.index')->with('success', 'Bệnh nhân và lịch hẹn đã bị xóa.');
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