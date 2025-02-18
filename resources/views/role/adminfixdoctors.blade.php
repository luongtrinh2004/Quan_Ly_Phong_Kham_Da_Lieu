<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <div class="py-3" style="background-color: #e0f7fa; border-bottom: 1px solid #ccc;">
            <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="d-flex align-items-center">
                    <img src="/img/logo.webp" alt="Logo" style="height: 50px;">
                </a>

                <!-- Search -->
                <div class="d-flex align-items-center" style="max-width: 400px; width: 100%;">
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." style="border-radius: 25px;">
                    <button class="btn btn-primary ms-2" style="border-radius: 25px;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                <!-- Actions -->
                <a href="#" class="btn btn-primary btn-sm rounded-pill px-3"
                    style="background-color: #007bff; border-color: #007bff;">Đặt lịch khám</a>
                <a href="#" class="btn btn-info btn-sm rounded-pill px-3" style="color: white;">1900 886648</a>
                <a href="#" class="btn btn-warning btn-sm rounded-pill px-3" style="color: white;">Hướng dẫn khách
                    hàng</a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">Đăng xuất</button>
                </form>

                <!-- Language Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-light btn-sm rounded-circle dropdown-toggle" id="languageDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/vn-flag.png" alt="VN" style="height: 20px;"> <!-- Icon cờ -->
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="#">Vietnamese</a></li>
                        <li><a class="dropdown-item" href="#">English</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg" style="background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">About
                            Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">Services</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">Contact</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/doctors') }}"
                            style="color: #0056b3; font-family: 'Poppins', sans-serif; font-size: 14px; font-weight: 500; margin: 0 10px;">Doctors</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>


    <div class="container py-4">
        <h1 class="text-center mb-4">Quản lý Bác Sĩ</h1>

        <!-- Tìm kiếm bác sĩ -->
        <form method="GET" action="{{ route('admin.doctors.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm bác sĩ..."
                    value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Form thêm hoặc sửa bác sĩ -->
        @if($editDoctor)
        <h3 class="mb-3">Sửa Bác Sĩ</h3>
        <form method="POST" action="{{ route('admin.doctors.update', $editDoctor->id) }}" enctype="multipart/form-data"
            class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-3 mb-2">
                    <input type="text" name="name" class="form-control" value="{{ $editDoctor->name }}" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="email" name="email" class="form-control" value="{{ $editDoctor->email }}" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="specialty" class="form-control" value="{{ $editDoctor->specialty }}"
                        required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="phone" class="form-control" value="{{ $editDoctor->phone }}" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="bio" class="form-control" value="{{ $editDoctor->bio }}">
                </div>
                <div class="col-md-3 mb-2">
                    <input type="file" name="image" class="form-control">
                    @if($editDoctor->image)
                    <img src="{{ asset($editDoctor->image) }}" alt="Ảnh"
                        style="width: 100px; height: 100px; object-fit: cover;">
                    @endif
                </div>
                <div class="col-md-3 mb-2">
                    <button type="submit" class="btn btn-warning w-100">Lưu Thay Đổi</button>
                </div>
            </div>
        </form>
        @else
        <h3 class="mb-3">Thêm Bác Sĩ</h3>
        <form method="POST" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-3 mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Tên bác sĩ" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="specialty" class="form-control" placeholder="Chuyên môn" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="bio" class="form-control" placeholder="Tiểu sử">
                </div>
                <div class="col-md-3 mb-2">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-3 mb-2">
                    <button type="submit" class="btn btn-success w-100">Thêm Bác Sĩ</button>
                </div>
            </div>
        </form>
        @endif


        <!-- Danh sách bác sĩ -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Chuyên môn</th>
                    <th>Số điện thoại</th>
                    <th>Ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->specialty }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>
                        @if($doctor->image)
                        <img src="{{ asset($doctor->image) }}" alt="Ảnh bác sĩ"
                            style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                        <span>Không có ảnh</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.doctors.index', ['edit_id' => $doctor->id]) }}"
                            class="btn btn-warning btn-sm">Sửa</a>
                        <form method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa bác sĩ này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer
        style="background-color:rgb(34, 152, 230); color: white; font-weight: bold; text-align: center; padding: 1rem 0;">
        <p>&copy; 2025 Phenikaa Clinic. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>