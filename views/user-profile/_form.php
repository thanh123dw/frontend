<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserProfile $model */
/** @var yii\widgets\ActiveForm $form */
$imagePath = Yii::$app->request->baseUrl . '/profile_pictures/' . 'profile-icon-empty.png'; // Đường dẫn tới hình ảnh
?>

<div class="userprofile-form container mt-4">

    <div class="d-flex align-items-start">
        <!-- Hình ảnh bên trái -->
        <div class="profile-image mr-4">
            <?= Html::img($imagePath, ['alt' => 'Hình ảnh nhân viên', 'class' => 'img-thumbnail rounded-circle', 'style' => 'width: 200px; height: 200px;']) ?>
        </div>

        <!-- Nội dung biểu mẫu bên phải -->
        <div class="profile-info flex-fill">
            <?php $form = ActiveForm::begin(); ?>

            <div class="custom-form-group">
                <?= $form->field($model, 'employee_id')->textInput(['maxlength' => true, 'disabled' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="custom-form-group">
                <?= $form->field($model, 'fullname')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="custom-form-group">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'disabled' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="custom-form-group">
                <?= $form->field($model, 'idcard')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="custom-form-group">
                <?= $form->field($model, 'taxcode')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="custom-form-group">
                <?= $form->field($model, 'address')->textarea(['rows' => 2, 'class' => 'form-control']) ?>
            </div>

            <div class="custom-form-group">
                <?= $form->field($model, 'phonenumber')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="custom-form-group">
                <?= $form->field($model, 'bankaccountnumber')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="custom-form-group">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
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
        flex: 1;
        margin-left: 10vw;
    }

    .img-thumbnail {
        border-radius: 50%; /* Viền tròn cho hình ảnh */
        border: 2px solid #ddd; /* Màu viền có thể thay đổi tùy ý */
    }

    .custom-form-group {
        margin-bottom: 20px;
        width: 100%; /* Đặt độ rộng 100% để nội dung có thể sử dụng toàn bộ không gian còn lại */
    }

    .custom-form-group input,
    .custom-form-group textarea {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        padding: 10px;
    }

    .custom-form-group input:disabled {
        background-color: #e9ecef;
    }

    .custom-form-group label {
        font-weight: bold;
    }
</style>
