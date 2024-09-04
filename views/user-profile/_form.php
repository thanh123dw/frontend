<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserProfile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="userprofile-form">

    <?php $form = ActiveForm::begin(); ?>


  <div class="custom-form-group ">
        <?= $form->field($model, 'employee_id')->textInput(['maxlength' => true, 'disabled' => true, 'class' => 'form-control']) ?>
    </div>

    <div class="custom-form-group ">
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

<style>
    .custom-form-group {
        margin-bottom: 20px; 
        width: 30%;
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
