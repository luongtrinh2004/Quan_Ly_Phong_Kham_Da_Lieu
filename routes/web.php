<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Trang chủ
Route::get('/', function () {
    return view('home');
})->name('home');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Routes cho bệnh nhân
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/appointments', [PatientController::class, 'appointments'])->name('patients.appointments');
    Route::post('/appointments', [PatientController::class, 'bookAppointment'])->name('patients.book');
});

// Routes cho Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('role.admin');
    })->name('admin.dashboard');

    // Quản lý bác sĩ
    Route::get('/admin/doctors', [AdminController::class, 'showDoctors'])->name('admin.doctors.index');
    Route::post('/admin/doctors', [AdminController::class, 'storeDoctor'])->name('admin.doctors.store');
    Route::get('/admin/doctors/{id}/edit', [AdminController::class, 'editDoctor'])->name('admin.doctors.edit');
    Route::post('/admin/doctors/{id}/update', [AdminController::class, 'updateDoctor'])->name('admin.doctors.update');
    Route::delete('/admin/doctors/{id}', [AdminController::class, 'destroyDoctor'])->name('admin.doctors.destroy');

    // Quản lý bệnh nhân
    Route::get('/admin/patients', [AdminController::class, 'showAllPatients'])->name('admin.patients.index');
    Route::post('/admin/patients', [AdminController::class, 'storePatient'])->name('admin.patients.store');
    Route::post('/admin/patients/{id}/update', [AdminController::class, 'updatePatient'])->name('admin.patients.update');
    Route::delete('/admin/patients/{id}', [AdminController::class, 'destroyPatient'])->name('admin.patients.destroy');

    // Quản lý lịch khám
    Route::get('/admin/appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments.index');
    Route::post('/admin/appointments', [AdminController::class, 'storeAppointment'])->name('admin.appointments.store');
    Route::post('/admin/appointments/{id}/update', [AdminController::class, 'updateAppointment'])->name('admin.appointments.update');
    Route::put('/admin/appointments/{id}/approve', [AdminController::class, 'approveAppointment'])->name('admin.appointments.approve');
    Route::put('/admin/appointments/{id}/reject', [AdminController::class, 'rejectAppointment'])->name('admin.appointments.reject');
    Route::delete('/admin/appointments/{id}', [AdminController::class, 'destroyAppointment'])->name('admin.appointments.destroy');

    // Quản lý hỗ trợ khách hàng
    Route::get('/admin/supports', [SupportController::class, 'index'])->name('admin.supports.index');
    Route::delete('/admin/supports/{id}', [SupportController::class, 'destroy'])->name('admin.supports.destroy');

    // Quản lý dịch vụ
    Route::get('/admin/manageservices', [ServiceController::class, 'manageServices'])->name('admin.manageservices');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('/services/{id}/update', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

// Routes cho AdminDoctor (Xem lịch nhưng không chỉnh sửa)
Route::middleware(['auth', 'role:admindoctor'])->group(function () {
    Route::get('/admindoctor/dashboard', function () {
        return view('role.admindoctor');
    })->name('admindoctor.dashboard');

    Route::get('/admindoctor/schedule', [DoctorController::class, 'showSchedule'])->name('doctor.schedule');
    Route::get('/admindoctor/patients', [DoctorController::class, 'showPatients'])->name('doctor.patients');
});

// Routes chung
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/get-doctors/{specialty}', [DoctorController::class, 'getDoctorsBySpecialty']);

// Hiển thị dịch vụ cho bệnh nhân
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Home Route sau khi đăng nhập
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// Routes đặt lịch khám
Route::middleware(['auth'])->group(function () {
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');

    Route::middleware(['auth', 'role:admindoctor'])->group(function () {
        Route::get('/admindoctor/dashboard', [DoctorController::class, 'showDashboard'])->name('admindoctor.dashboard');
    });

    Route::middleware(['role:admindoctor'])->group(function () {
        Route::get('/doctor/schedule', [DoctorController::class, 'showSchedule'])->name('doctor.schedule');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments.index');
        Route::get('/admin/patients', [AdminController::class, 'showAllPatients'])->name('admin.patients.index');
    });
});

// Routes hỗ trợ khách hàng
Route::get('/support', [SupportController::class, 'create'])->name('support.create');
Route::post('/support', [SupportController::class, 'store'])->name('support.store');

// Chatbot
Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/send', [ChatbotController::class, 'sendMessage'])->name('chatbot.send');