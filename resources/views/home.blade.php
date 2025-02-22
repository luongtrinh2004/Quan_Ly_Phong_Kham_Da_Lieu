@extends('layouts.app')

@section('title', 'Home')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="hero" style="background: url('/img/bg1.png') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('/img/bg2.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('/img/bg3.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="relative w-full bg-light-white-blue">
    <div class="relative flex justify-center gap-x pad-top">
         <!-- Gọi tổng đài -->
    <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="tel:1900886648" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#00AEEF]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/phone.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Gọi tổng đài</p>
    </a>
    <a href="tel:1900886648" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
        Tổng đài viên của chúng tôi sẽ giải đáp các câu hỏi của bạn
      </span>
    </a>
    </div>
  <!-- Đặt lịch hẹn -->
  <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="/" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#03428E]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/lich.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Đặt lịch hẹn</p>
    </a>
    <a href="tel:1900886648" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
      Đặt lịch hẹn với các chuyên gia của PHENIKAAMEC
      </span>
    </a>
  </div>
  <!-- Tìm bác sĩ -->
  <div class="h-[124px] w-[276px] flex-col rounded-[16px] bg-[#FFFFFF] text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 4px 4px 20px 0px;">
    <a href="/" class="flex items-center justify-center gap-x-3 rounded-t-[16px] p-3 text-white bg-[#F58220]">
      <img 
        alt="Gọi tổng đài" 
        loading="lazy" 
        width="24" 
        height="24" 
        decoding="async" 
        data-nimg="1" 
        class="h-6 w-6" 
        src="/img/icon-doctor.png" 
        style="color: transparent; width: 24px; height: 24px;"
      />
      <p class="text-base font-bold leading-normal text-white" style="margin: auto auto ">Tìm bác sĩ</p>
    </a>
    <a href="/" class="mt-1 flex h-[60px] flex-col justify-center">
      <span class="p-1 text-center font-medium text-textSpan lg:p-4">
      Chọn bác sĩ theo tên, chuyên môn và nhiều hơn thế
      </span>
    </a>
    </div>
  </div>
  <div class=" flex w-full justify-center">
    <div class="container size-full flex-col flex " style="width:1000px">
      <div class="mt-8">
        <div class="flex flex-col items-center">
          <h1 class=" text-[20px] normal-case leading-8 text-secondary-2 lg:text-[24px] lg:!uppercase text-md md:text-2xl lg:text-center">Phenikaamec - Hệ thống y tế hàn lâm đẳng cấp quốc tế</h1>
          <div class="gachchan"></div>
        </div>
        <h2 class="title-blue-1">Về chúng tôi</h2>
        <div class="grid-2">
          <div class="relative">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;">
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">PhenikaaMec là hệ thống y tế hàn lâm đẳng cấp quốc tế thuộc Hệ sinh thái Chăm sóc sức khỏe Tập đoàn Phenikaa. Thành lập năm 2010, PHENIKAA hiện là tập đoàn kinh tế đa ngành với hơn 30 đơn vị thành viên hoạt động trong và ngoài nước (Mỹ, Canada…), trên các lĩnh vực cốt lõi: Công nghiệp, Công nghệ, Giáo dục đào tạo, Chăm sóc sức khỏe và các dịch vụ khác.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Với định hướng phát triển bền vững và nền tảng vững chắc về khoa học công nghệ, hệ thống chuyên nghiệp, con người sẵn sàng thích ứng - đổi mới, hoạt động theo mô hình Hệ sinh thái “3 Nhà”: Nhà Sản xuất Kinh doanh – Nhà Khoa học – Nhà Giáo dục, gắn kết chặt chẽ và tương hỗ lẫn nhau, Tập đoàn đang xây dựng và phát triển PHENIKAA trở thành thương hiệu tiên phong, uy tín tại Việt Nam và quốc tế về vật liệu tiên tiến, vật liệu sinh thái cao cấp, sản phẩm ; giải pháp thông minh, dịch vụ giáo dục - chăm sóc sức khỏe nhân văn và xuất sắc.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Sở hữu thế mạnh về nền tảng đào tạo nguồn nhân lực Y - Dược và Nghiên cứu khoa học, Tập đoàn Phenikaa phát triển hệ sinh thái khép kín trong lĩnh vực Chăm sóc sức khỏe với 4 mảng: Giáo dục và Đào tạo – Chăm sóc sức khỏe - Sản xuất kinh doanh – Công nghệ và chuyển giao.</span></p>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">PHENIKAAMEC nuôi dưỡng khát vọng cống hiến, vun đắp niềm tin, nỗ lực vươn tầm nhằm mang đến các giá trị cho xã hội và nâng cao sức khỏe cộng đồng với mục tiêu:</span></p>
            </div>
          </div>
          <img src="./img/img1.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
        </div>
        <h2 class="title-blue-1">Tầm nhìn - sứ mệnh - giá trị cốt lõi</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="grid-item">
              <img src="/img/img2.webp" alt="Tầm nhìn" style="height: 169.14;">
              <h3 class="hover-blue" style="cursor:pointer;">Tầm nhìn</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img3.webp" alt="Sứ mệnh">
              <h3 class="hover-blue" style="cursor:pointer;">Sứ mệnh</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img4.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Giá trị cốt lõi</h3>
          </div>
        </div>

        <div class="csvc">
        <div class="title-csvc">CƠ SỞ VẬT CHẤT HIỆN ĐẠI</div>
        <div class="sub-title-csvc">
            PHENIKAAMEC là hệ thống y tế hàn lâm đẳng cấp Quốc tế thuộc hệ sinh thái chăm sóc sức khỏe Phenikaa của Tập đoàn Phenikaa. Với sự đầu tư mạnh mẽ, sử dụng các trang thiết bị y tế, máy móc hiện đại bậc nhất trên thế giới cùng với cơ sở vật chất tiêu chuẩn 5 sao, PHENIKAAMEC sẽ là một trong những mô hình có dịch vụ y tế chất lượng cao, quy mô lớn trên cả nước.
        </div>

        <div class="tag-csvc">
            <div class="tag">
                <img src="/img/img20.webp" alt="Facility 1">
                <div class="tag-content">
                    <h3>Khu vực lễ tân</h3>
                    <p>Khu vực tiếp đón hiện đại, tiện nghi, mang đến trải nghiệm tốt nhất cho khách hàng.</p>
                </div>
            </div>

            <div class="tag">
                <img src="/img/img21.webp" alt="Facility 2" style="height:280px">
                <div class="tag-content">
                    <h3>Phòng làm việc</h3>
                    <p>Được trang bị các thiết bị y tế hiện đại nhất, đảm bảo tiêu chuẩn quốc tế.</p>
                </div>
            </div>

            <div class="tag">
                <img src="/img/img22.webp" alt="Facility 3">
                <div class="tag-content">
                    <h3>Phòng điều trị</h3>
                    <p>Không gian rộng rãi, thoải mái, mang lại cảm giác yên tâm cho bệnh nhân.</p>
                </div>
            </div>

        </div>
      </div>

      <div class="csvc">
        <div class="title-csvc">Danh Sách Dịch Vụ</div>
        <div class="sub-title-csvc">
            PHENIKAAMEC cung cấp các giải pháp y tế tiên tiến với chất lượng cao, đội ngũ bác sĩ và nhân
            viên chuyên nghiệp, trang thiết bị hiện đại, cùng sự hỗ trợ toàn diện cho bệnh nhân quốc tế,
            từ dịch vụ phiên dịch và hỗ trợ visa đến các tiện nghi và dịch vụ chăm sóc đặc biệt, nhằm
            đảm bảo trải nghiệm điều trị tốt nhất cho người bệnh.
        </div>
        <!-- Hiển thị dịch vụ -->
        <div class="grid-3">
              @if(isset($services) && $services->count() > 0)
                  @foreach($services as $service)
                      <div class="grid-item">
                          <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" style="height: 169.14px;"
                              onerror="this.onerror=null; this.src='{{ asset('img/default.jpg') }}';">
                          <h3>{{ $service->name }}</h3>
                      </div>
                  @endforeach
              @else
                  <p class="text-center">Hiện chưa có dịch vụ nào.</p>
              @endif
          
      </div>
      <div class="flex w-full justify-center mt-8">
          <button class="load-more">Xem thêm &gt;&gt;</button>
        </div>

        <h2 class="title-blue-1">Trang thiết bị tân tiến</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="grid-item">
              <img src="/img/img5.webp" alt="Tầm nhìn">
              <h3 class="hover-blue" style="cursor:pointer;">Y học hạt nhân</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img6.webp" alt="Sứ mệnh">
              <h3 class="hover-blue" style="cursor:pointer;">Máy xạ trị</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img7.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Hệ thống can thiệp mạch</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img8.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy CT</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img9.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy MRI</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img10.webp" alt="Giá trị cốt lõi">
              <h3 class="hover-blue" style="cursor:pointer;">Máy X-Quang</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img11.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Máy đo đa năng</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img12.webp" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Bộ đo mạch và huyết áp</h3>
          </div>
          <div class="grid-item">
              <img src="/img/img13.jpeg" alt="Giá trị cốt lõi" style="height:179.29px;">
              <h3 class="hover-blue" style="cursor:pointer;">Máy chẩn đoán hiện đại</h3>
          </div>
        </div>
        <h2 class="title-blue-1">Thành tựu Phenikaamec</h2>
        <div class="grid-3" style="margin:20px 25px;margin-left: 85px;">
          <div class="card">
            <img src="/img/img14.webp" alt="HDF Online" class="card-image">
            <div class="card-content">
              <h3>PHENIKAAMEC sẵn sàng đưa vào hoạt động kỹ thuật lọc thận HDF online</h3>
              <p>Khoa Thận nhân tạo – Bệnh viện Đại học Phenikaa ngay từ đầu thành lập đã được chú trọng đầu tư...</p>
            </div>
          </div>
          <div class="card">
            <img src="/img/img15.webp" alt="DSA Technology" class="card-image">
            <div class="card-content">
              <h3>PhenikaaMec làm chủ kỹ thuật chụp DSA – “thủ thuật Vàng” trong chẩn đoán hình ảnh</h3>
              <p>Chụp mạch số hóa xóa nền (DSA) chính là “cánh tay đắc lực” hỗ trợ các chuyên gia...</p>
            </div>
          </div>
          <div class="card">
            <img src="/img/img16.webp" alt="I131 Treatment" class="card-image">
            <div class="card-content ">
              <h3>Sắp thêm một địa chỉ điều trị ung thư tuyến giáp bằng I131 tại Hà Nội</h3>
              <p>Xạ trị I131 là dược chất phóng xạ, dùng trong điều trị bệnh nhân ung thư tuyến giáp...</p>
            </div>
          </div>
        </div>
        <div class="flex w-full justify-center">
          <button class="load-more">Xem thêm &gt;&gt;</button>
        </div>
        <h2 class="title-blue-1">Công ty cổ phần y học vĩnh thiện</h2>
        <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px ; white-space: pre-wrap;">Là đơn vị chủ quản của Bệnh viện Đại học Phenikaa, nằm trong hệ sinh thái chăm sóc sức khỏe của Tập đoàn Phenikaa, Công ty CP Y học Vĩnh Thiện là đơn vị bảo hộ và quản lý các hoạt động cho các đơn vị trong lĩnh vực chăm sóc sức khỏe của Tập đoàn và đảm bảo công tác vận hành, đào tạo chuyên môn, nghiên cứu khoa học.<br>Trong mảng Chăm sóc sức khỏe, các dự án trọng tâm của Vĩnh Thiện bao gồm: Bệnh viện Đại học Phenikaa và Hệ thống phòng khám vệ tinh, Trung tâm Y khoa phục vụ giảng dạy và nghiên cứu, Hệ thống bệnh án điện tử, quản lý bệnh viện theo hướng số hóa, triển khai Y tế từ xa…. Với Hệ sinh thái Khoa học sức khỏe Phenikaa được bảo hộ bởi Công ty Cổ phần Vĩnh Thiện, Tập đoàn Phenikaa đặt mục tiêu trở thành thương hiệu uy tín hàng đầu chuyên cung cấp các sản phẩm dịch vụ chất lượng vượt trội trong lĩnh vực Chăm sóc sức khỏe, góp phần nâng cao chất lượng cuộc sống, mang đến sức khỏe, bình an và hạnh phúc cho người Việt.</span></p>
        <div class="grid-2" style="margin: 0 55px;margin-bottom: 2.5rem;">
          <img src="./img/img17.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
          <div class="relative" style="background-color: rgb(231 249 255 / var(--tw-bg-opacity, 1));">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;padding: 25px">
              <h3 style="color: rgb(3 66 142 / var(--tw-text-opacity, 1));font-size: 16px;">Bệnh viện Đại học Phenikaa</h3>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Bệnh viện Đại học Phenikaa là dự án trọng điểm trong lĩnh vực chăm sóc sức khỏe của Tập đoàn Phenikaa. Với tổng diện tích sàn xây dựng xấp xỉ 90.000 m2 trong khuôn viên rộng hơn 3,1 hecta gồm 4 tòa nhà chính và các công trình cảnh quan, giao thông đáp ứng hơn 2000 lượt khám mỗi ngày với gần 800 giường bệnh phục vụ điều trị nội trú. Bệnh viện Đại học Phenikaa mang nhiều kỳ vọng sẽ tạo dựng được dấu ấn của Phenikaa trong xu hướng xã hội hóa y tế hiện nay với tầm nhìn</span></p>
            </div>
          </div>
          <div class="relative" style="background-color: rgb(231 249 255 / var(--tw-bg-opacity, 1));">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;padding: 25px">
              <h3 style="color: rgb(3 66 142 / var(--tw-text-opacity, 1));font-size: 16px;">Phòng khám Đa khoa Đại học Phenikaa</h3>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Phòng khám Đa khoa Bệnh viện Đại học Phenikaa thuộc Hệ sinh thái chăm sóc sức khỏe Phenikaa với nền tảng Con người tri thức và nhân văn – Hệ thống thông minh – Công nghệ tiên tiến, mang đến chất lượng điều trị xuất sắc, dịch vụ chăm sóc hoàn hảo, kết quả nghiên cứu mang tính đột phá và giáo dục nâng tầm tri thức trong lĩnh vực y học vì một cộng đồng khỏe mạnh, nhân văn và tri thức.   Với dịch vụ khám, chữa bệnh chất lượng cao và tinh thần phục vụ chu đáo, Phòng Khám Đa khoa Bệnh viện Đại học Phenikaa là một địa chỉ khám, chữa bệnh tin cậy cho người dân Thành phố Hà Nội và các khu vực lân cận.</span></p>
            </div>
          </div>
          <img src="./img/img18.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
          <img src="./img/img19.webp" alt="" class="object-cover h-[312px] rounded-xl w-full" style="">
          <div class="relative" style="background-color: rgb(231 249 255 / var(--tw-bg-opacity, 1));">
            <div class="article-content scrollbar-thin leading-loose overflow-y-auto h-[312px] flex-col" style="font-weight: 400;font-size: .875rem;padding-right: .5rem;padding: 25px">
              <h3 style="color: rgb(3 66 142 / var(--tw-text-opacity, 1));font-size: 16px;">Phòng khám Răng Hàm Mặt Đại học Phenikaa</h3>
              <p style="text-align: justify; font-size: 16px;"><span style="font-size: 16px; white-space: pre-wrap;">Cuối năm 2023, Phòng khám Răng Hàm Mặt đại học Phenikaa ra đời và đi vào vận hành, đánh dấu bước đầu tiên trong việc hiện thực hóa các cam kết trong lĩnh vực Chăm sóc sức khỏe của Tập đoàn. Sứ mệnh của Phòng khám không chỉ dừng lại ở việc chăm sóc răng miệng truyền thống, mà còn tạo ra môi trường nuôi dưỡng tối ưu, nơi sức khỏe răng miệng và sức khỏe tổng thể của khách hàng được đặt lên hàng đầu, mang đến công nghệ tiên tiến, đội ngũ chuyên nghiệp với kĩ năng cao, cam kết cung cấp dịch vụ tốt nhất phù hợp với nhu cầu cá nhân của từng người. Với dịch vụ khám, chữa bệnh chất lượng cao và tinh thần phục vụ chu đáo, Phòng Khám Đa khoa Bệnh viện Đại học Phenikaa là một địa chỉ khám, chữa bệnh tin cậy cho người dân Thành phố Hà Nội và các khu vực lân cận.</span></p>
            </div>
          </div>
        </div>
        
        

      </div>
    </div>
  </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-3">Liên hệ với chúng tôi</h2>
            <p class="lead">Bạn có câu hỏi hoặc cần hỗ trợ? Hãy để lại tin nhắn, chúng tôi sẽ phản hồi sớm nhất.</p>
        </div>
    </div>

    <!-- Form hỗ trợ bệnh nhân -->
    <div class="container py-4">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-3">Gửi Yêu Cầu Hỗ Trợ</h4>
            <form action="{{ route('support.store_home') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Tuổi</label>
                    <input type="number" name="age" id="age" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Nội dung cần hỗ trợ</label>
                    <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Gửi yêu cầu</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Địa chỉ & Liên hệ -->
    <div class="row text-center mt-5">
        <div class="col-md-4">
            <h5><i class="bi bi-geo-alt"></i> Địa chỉ</h5>
            <p>Tầng 1, 2, 3 - Số 167 Hoàng Ngân, Hà Nội</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-telephone"></i> Điện thoại</h5>
            <p>02422226699</p>
        </div>
        <div class="col-md-4">
            <h5><i class="bi bi-envelope"></i> Email</h5>
            <p>support@phenikaamec.com</p>
        </div>
    </div>
</div>
























<!-- Chatbot Floating Button -->
<style>
.chatbot-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.chatbot-button:hover {
    transform: scale(1.1);
}

.chatbot-tooltip {
    position: fixed;
    bottom: 90px;
    right: 30px;
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 14px;
    display: none;
}

.chatbot-button i {
    font-size: 28px;
}
</style>

<!-- Tooltip -->
<div class="chatbot-tooltip" id="chatbot-tooltip">Chat ngay với PhenikaaMec AI</div>

<!-- Chatbot Button with Message Icon -->
<div class="chatbot-button" id="chatbot-button">
    <i class="fas fa-comment-dots"></i> <!-- Thay icon bằng tin nhắn -->
</div>

<script>
document.getElementById('chatbot-button').addEventListener('click', function() {
    window.location.href = "{{ route('chatbot.index') }}";
});

document.getElementById('chatbot-button').addEventListener('mouseenter', function() {
    document.getElementById('chatbot-tooltip').style.display = 'block';
});

document.getElementById('chatbot-button').addEventListener('mouseleave', function() {
    document.getElementById('chatbot-tooltip').style.display = 'none';
});
</script>

@endsection