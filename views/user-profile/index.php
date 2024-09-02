<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserProfileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\UserProfile $userprofile */

$this->title = 'Thông tin nhân viên';
$this->params['breadcrumbs'][] = $this->title;


$user = Yii::$app->session->get('user');
?>
<div class="userprofile-index container mt-4 ">

     <table class="table table-bordered border " style="width: 50%">
    <tr class="text-center ">
        <th >Họ và Tên</th>
        <td><?= Html::encode($userprofile['fullname']) ?></td>
    </tr>
    <tr class="text-center">
        <th>Thẻ Căn Cước</th>
        <td><?= Html::encode($userprofile['idcard']) ?></td>
    </tr>
    <tr class="text-center ">
        <th>Địa Chỉ</th>
        <td><?= Html::encode($userprofile['address']) ?></td>
    </tr>
    <tr class="text-center ">
        <th>Số Điện Thoại</th>
        <td><?= Html::encode($userprofile['phonenumber']) ?></td>
    </tr>
    <tr class="text-center ">
        <th>Tài Khoản Ngân Hàng</th>
        <td><?= Html::encode($userprofile['bankaccountnumber']) ?></td>
    </tr>
    <tr class="text-center ">
        <th>Mã Số Thuế</th>
        <td><?= Html::encode($userprofile['taxcode']) ?></td>
    </tr>
</table>
            <p>
                <?= Html::a('Cập Nhật Thông Tin', ['update', 'id' => $user['id']], ['class' => 'btn btn-primary text-center']) ?>
            </p>
       
   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



</div>

