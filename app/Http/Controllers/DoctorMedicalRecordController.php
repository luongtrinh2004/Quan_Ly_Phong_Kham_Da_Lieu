<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorMedicalRecordController extends Controller
{
    // 📌 Hiển thị danh sách hồ sơ bệnh án của bác sĩ đăng nhập
    public function index(Request $request)
    {
        $search = $request->input('search');
        $doctorId = Auth::user()->id;

        $query = MedicalRecord::where('doctor_id', $doctorId);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('cccd', 'like', "%{$search}%")
                    ->orWhere('diagnosis', 'like', "%{$search}%");
            });
        }

        $medicalRecords = $query->latest()->paginate(10);
        $doctors = Doctor::all();

        $editMedicalRecord = null;
        if ($request->has('edit_id')) {
            $editMedicalRecord = MedicalRecord::find($request->input('edit_id'));
        }

        return view('role.doctormanagemedicalrecords', compact('medicalRecords', 'doctors', 'search', 'editMedicalRecord'));
    }

    // 📌 Thêm hồ sơ bệnh án mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer',
            'cccd' => 'required|string|max:255',
            'service' => 'nullable|string|max:255',
            'exam_date' => 'required|date',
            'cost' => 'nullable|numeric',
            'status' => 'required|in:paid,unpaid',
            'diagnosis' => 'required|string',
            'prescription' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        if ($request->filled('cost')) {
            $request->merge(['cost' => $request->input('cost') * 1000]);
        }

        $request->merge(['doctor_id' => Auth::user()->id]);

        MedicalRecord::create($request->all());

        return redirect()->route('admindoctor.medicalrecords.index')
            ->with('success', 'Hồ sơ bệnh án đã được tạo thành công.');
    }

    // 📌 Hiển thị form chỉnh sửa hồ sơ bệnh án
    public function edit($id)
    {
        $record = MedicalRecord::where('doctor_id', Auth::user()->id)->findOrFail($id);
        $medicalRecords = MedicalRecord::where('doctor_id', Auth::user()->id)->latest()->paginate(10);

        return view('role.doctormanagemedicalrecords', compact('record', 'medicalRecords'));
    }

    // 📌 Cập nhật hồ sơ bệnh án
    public function update(Request $request, $id)
    {
        $record = MedicalRecord::where('doctor_id', Auth::user()->id)->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer',
            'cccd' => 'required|string|max:255',
            'service' => 'nullable|string|max:255',
            'exam_date' => 'required|date',
            'cost' => 'nullable|numeric',
            'status' => 'required|in:paid,unpaid',
            'diagnosis' => 'required|string',
            'prescription' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        if ($request->filled('cost')) {
            $request->merge(['cost' => $request->input('cost') * 1000]);
        }

        $record->update($request->all());

        return redirect()->route('admindoctor.medicalrecords.index')
            ->with('success', 'Hồ sơ bệnh án đã được cập nhật thành công.');
    }

    // 📌 Xóa hồ sơ bệnh án
    public function destroy($id)
    {
        $record = MedicalRecord::where('doctor_id', Auth::user()->id)->findOrFail($id);
        $record->delete();

        return redirect()->route('admindoctor.medicalrecords.index')
            ->with('success', 'Hồ sơ bệnh án đã được xóa thành công.');
    }
}