<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\WorkSchedule $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $shiftTypes */
?>

<div class="work-schedule-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'workdate')->widget(DatePicker::className(), [
                'dateFormat' => 'php:d-m-y', // Định dạng ngày
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'shifttype')->dropDownList($shiftTypes) ?>

        </div>
        <div class="col-6">
            <?= $form->field($model, 'starttime')->widget(MaskedInput::className(), [
                'mask' => '99:99:99', // Định dạng giờ
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'endtime')->widget(MaskedInput::className(), [
                'mask' => '99:99:99', // Định dạng giờ
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'locked')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn px-2 btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>