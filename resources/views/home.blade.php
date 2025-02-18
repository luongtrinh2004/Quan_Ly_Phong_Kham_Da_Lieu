@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="hero" style="background: url('/img/bg1.webp') no-repeat center center/cover; height: 500px;">
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