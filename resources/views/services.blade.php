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

                        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
                            <div class="grid-item">
                                <img src="/img/img31.webp" alt="Tầm nhìn">
                                <h3 class="hover-blue" style="cursor:pointer;height:65px">
                                    Quản Lý Song Thai - Đa Thai</h3>
                            </div>
                            <div class="grid-item">
                                <img src="/img/img23.webp" alt="Sứ mệnh">
                                <h3 class="hover-blue" style="cursor:pointer;">Khám Sàng Lọc Bệnh Lý Tim Bẩm Sinh</h3>
                            </div>
                            <div class="grid-item">
                                <img src="/img/img24.webp" alt="Giá trị cốt lõi">
                                <h3 class="hover-blue" style="cursor:pointer;height:60px">Chăm Sóc Thai Sản Trọn Gói</h3>
                            </div>
                            <div class="grid-item">
                                <img src="/img/img25.webp" alt="Giá trị cốt lõi">
                                <h3 class="hover-blue" style="cursor:pointer;">Gói Phục Hồi Chức Năng</h3>
                            </div>
                            <div class="grid-item">
                                <img src="/img/img26.webp" alt="Giá trị cốt lõi" style="height: 166px;">
                                <h3 class="hover-blue" style="cursor:pointer;">Nội Soi Tiêu Hóa</h3>
                            </div>
                            <div class="grid-item">
                                <img src="/img/img27.webp" alt="Giá trị cốt lõi">
                                <h3 class="hover-blue" style="cursor:pointer;">Gói Xét Nghiệm Theo Yêu Cầu</h3>
                            </div>
                            <div class="grid-item">
                                <img src="/img/img28.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
                                <h3 class="hover-blue" style="cursor:pointer;">Gói Sàng Lọc Trước Sinh</h3>
                            </div>
                            <div class="grid-item">
                                <img src="/img/img29.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
                                <h3 class="hover-blue" style="cursor:pointer;">Gói Khám Nhi</h3>
                            </div>
                            <div class="grid-item">
                                <img src="/img/img30.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
                                <h3 class="hover-blue" style="cursor:pointer;">Tầm Soát Ung Thư Toàn Diện</h3>
                            </div>
                        </div>

                        <div class="flex w-full justify-center">
                            <button class="load-more">Xem thêm &gt;&gt;</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        @endsection