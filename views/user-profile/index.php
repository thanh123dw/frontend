<?php

use yii\helpers\Html;
use yii\helpers\Url;
/** @var yii\web\View $this */
/** @var app\models\UserProfileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\UserProfile $userprofile */


$this->title = 'Thông tin nhân viên';
$this->params['breadcrumbs'][] = $this->title;

$user = Yii::$app->session->get('user');
$imagePath = Yii::$app->request->baseUrl . '/profile_pictures/' . 'profile-icon-empty.png'; // Đường dẫn tới hình ảnh
?>
<div class="userprofile-index container mt-4">

    <div class="d-flex align-items-start">
        <!-- Hình ảnh bên trái -->
        <div class="profile-image mr-4">
            <?= Html::img($imagePath, ['alt' => 'Hình ảnh nhân viên', 'class' => 'img-thumbnail rounded-circle', 'style' => 'width: 30vw; height: 30vw;']) ?>
        </div>

        <!-- Thông tin nhân viên bên phải -->
        <div class="profile-info">
            <table class="table table-bordered">
                <tr>
                    <th>Họ và Tên</th>
                    <td><?= Html::encode($userprofile['fullname']) ?></td>
                </tr>
                <tr>
                    <th>Thẻ Căn Cước</th>
                    <td><?= Html::encode($userprofile['idcard']) ?></td>
                </tr>
                <tr>
                    <th>Địa Chỉ</th>
                    <td><?= Html::encode($userprofile['address']) ?></td>
                </tr>
                <tr>
                    <th>Số Điện Thoại</th>
                    <td><?= Html::encode($userprofile['phonenumber']) ?></td>
                </tr>
                <tr>
                    <th>Tài Khoản Ngân Hàng</th>
                    <td><?= Html::encode($userprofile['bankaccountnumber']) ?></td>
                </tr>
                <tr>
                    <th>Mã Số Thuế</th>
                    <td><?= Html::encode($userprofile['taxcode']) ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="text-center mt-4 d-flex"style="margin-left:50%">
        <?= Html::a('Cập Nhật Thông Tin', ['update', 'id' => $user['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hoạt Động', Url::to(['activity/index']), ['class' => 'btn btn-success ms-2']) ?>
    </div>
    

</div>

<style>
    .d-flex {
        display: flex;
    }
    .align-items-start {
        align-items: flex-start;
    }
    .profile-image {
        flex-shrink: 0;
    }
    .profile-info {
        margin-left: 10px;
        margin-top: 10vw;
        flex: 1;
    }
    .img-thumbnail {
        border-radius: 50%; /* Viền tròn cho hình ảnh */
        border: 2px solid #ddd; /* Màu viền có thể thay đổi tùy ý */
    }
    .table th, .table td {
        text-align: left;
    }
</style>