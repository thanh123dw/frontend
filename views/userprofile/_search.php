<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserprofileSearch $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="userprofile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'idcard') ?>

    

    <?php // echo $form->field($model, 'taxcode') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'phonenumber') ?>

    <?php // echo $form->field($model, 'bankaccountnumber') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'token') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'staffids') ?>

    <?php // echo $form->field($model, 'point') ?>

    <?php // echo $form->field($model, 'locked') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
