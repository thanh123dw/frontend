<?php

/** @var yii\web\View $this */

$this->title = 'Home Page';
?>

<div class="welcome-image">
    <img src="https://media.istockphoto.com/id/910118874/vi/vec-to/%C4%91%E1%BB%99i-ng%C5%A9-b%C3%A1c-s%C4%A9.jpg?s=612x612&w=0&k=20&c=cuoP5Dmm505uVameSfqsPHiV62bbpqIQkk1xhYu5ZJQ=" alt="Welcome Image">
    <div class="welcome-text">Welcome to Quản Lý Nhân Sự!!</div>
</div>

<style>
    .welcome-image {
        position: relative;
        max-width: 100%; /* Đảm bảo hình ảnh không tràn ngang */
        overflow: hidden; /* Ẩn phần tràn nếu có */
    }
    .welcome-image img {
        width: 100%;
        height: auto;
        max-width: 100%; /* Giới hạn chiều rộng của hình ảnh */
        max-height: 80vh; /* Giới hạn chiều cao của hình ảnh */
        object-fit: contain; /* Đảm bảo hình ảnh chứa toàn bộ mà không bị biến dạng */
    }
    .welcome-text {
        position: absolute;
        bottom: 10px; /* Căn lề dưới */
        left: 50%; /* Căn giữa theo chiều ngang */
        transform: translateX(-50%); /* Điều chỉnh vị trí để căn giữa */
        font-size: 3em; /* Kích thước chữ to */
        font-weight: bold;
        color: black; /* Màu chữ đen */
        padding: 5px 10px; /* Khoảng cách giữa chữ và viền */
        border-radius: 5px; /* Bo tròn các góc */
        white-space: nowrap; /* Đảm bảo chữ không bị xuống dòng */
    }
</style>
