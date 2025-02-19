@extends('layouts.app')

@section('title', 'Dịch Vụ')
@section('head')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">

@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="hero"
                style="background: url('/img/service.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>


    </div>
    <div class="relative w-full bg-light-white-blue">
        <div class="relative flex justify-center gap-x pad-top">
            <!-- Gọi tổng đài -->
            <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center"
                style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
                <a href="/contact"
                    class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#00AEEF]">
                    <img alt="Gọi tổng đài" loading="lazy" width="24" height="24" decoding="async" data-nimg="1"
                        class="h-6 w-6" src="/img/phone.png" style="color: transparent; width: 24px; height: 24px;" />
                    <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Liên Hệ Hỗ Trợ
                    </p>
                </a>
                <a href="/contact" class="mt-1 flex h-[60px] flex-col justify-center">
                    <span class="p-1 text-center font-medium text-textSpan lg:p-4">
                        Tổng đài viên của chúng tôi sẽ giải đáp các câu hỏi của bạn
                    </span>
                </a>
            </div>
            <!-- Đặt lịch hẹn -->
            <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center"
                style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
                <a href="/appointments/create"
                    class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#03428E]">
                    <img alt="Gọi tổng đài" loading="lazy" width="24" height="24" decoding="async" data-nimg="1"
                        class="h-6 w-6" src="/img/lich.png" style="color: transparent; width: 24px; height: 24px;" />
                    <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Đặt lịch hẹn</p>
                </a>
                <a href="/appointments/create" class="mt-1 flex h-[60px] flex-col justify-center">
                    <span class="p-1 text-center font-medium text-textSpan lg:p-4">
                        Đặt lịch hẹn với các chuyên gia của PHENIKAAMEC
                    </span>
                </a>
            </div>
            <!-- Tìm bác sĩ -->
            <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center"
                style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
                <a href="/doctors"
                    class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#F58220]">
                    <img alt="Gọi tổng đài" loading="lazy" width="24" height="24" decoding="async" data-nimg="1"
                        class="h-6 w-6" src="/img/icon-doctor.png"
                        style="color: transparent; width: 24px; height: 24px;" />
                    <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Tìm bác sĩ</p>
                </a>
                <a href="/doctors" class="mt-1 flex h-[60px] flex-col justify-center">
                    <span class="p-1 text-center font-medium text-textSpan lg:p-4">
                        Chọn bác sĩ theo tên, chuyên môn và nhiều hơn thế
                    </span>
                </a>
            </div>
        </div>
        <div class=" flex w-full justify-center">
            <div class="container size-full flex-col flex " style="width:1000px">
                <div class="mt-8">


                    <div class="csvc">
                        <div class="title-csvc">Danh Sách Dịch Vụ</div>
                        <div class="sub-title-csvc">
                            PHENIKAAMEC cung cấp các giải pháp y tế tiên tiến với chất lượng cao, đội ngũ bác sĩ và nhân
                            viên chuyên nghiệp, trang thiết bị hiện đại, cùng sự hỗ trợ toàn diện cho bệnh nhân quốc tế,
                            từ dịch vụ phiên dịch và hỗ trợ visa đến các tiện nghi và dịch vụ chăm sóc đặc biệt, nhằm
                            đảm bảo trải nghiệm điều trị tốt nhất cho người bệnh.
                        </div>



                        <style>
                        /* Grid hiển thị dịch vụ */
                        .grid-3 {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                            gap: 20px;
                            justify-content: center;
                            max-width: 1000px;
                            margin: 20px auto;
                        }

                        /* Ô chứa mỗi dịch vụ */
                        .grid-item {
                            background: white;
                            border-radius: 12px;
                            overflow: hidden;
                            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                            text-align: center;
                            padding-bottom: 15px;
                        }

                        .grid-item:hover {
                            transform: translateY(-5px);
                            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
                        }

                        /* Hình ảnh dịch vụ */
                        .grid-item img {
                            width: 100%;
                            height: 220px;
                            /* Chiều cao cố định */
                            object-fit: cover;
                            /* Cắt ảnh vừa với khung */
                            border-bottom: 3px solid #00AEEF;
                        }

                        /* Tên dịch vụ */
                        .grid-item h3 {
                            font-size: 16px;
                            font-weight: bold;
                            color: #03428E;
                            padding: 15px;
                            margin: 0;
                            background: #EAF6FF;
                            border-radius: 0 0 12px 12px;
                        }
                        </style>

                        <!-- Hiển thị dịch vụ -->
                        <div class="grid-3">
                            @if(isset($services) && $services->count() > 0)
                            @foreach($services as $service)
                            <div class="grid-item">
                                <img src="{{ asset($service->image) }}" alt="{{ $service->name }}"
                                    onerror="this.onerror=null; this.src='{{ asset('img/default.jpg') }}';">
                                <h3>{{ $service->name }}</h3>
                            </div>
                            @endforeach
                            @else
                            <p class="text-center">Hiện chưa có dịch vụ nào.</p>
                            @endif
                        </div>







                        <div class="flex w-full justify-center">
                            <button class="load-more">Xem thêm &gt;&gt;</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        @endsection