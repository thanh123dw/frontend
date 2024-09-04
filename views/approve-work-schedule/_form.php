<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\ApproveWorkSchedule $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $shiftTypes */
?>

<div class="approve-work-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workscheduleid')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'staffid')->hiddenInput()->label(false) ?>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'workdate')->widget(DatePicker::className(), [
                'dateFormat' => 'php:d-m-yy', // Định dạng ngày
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>

        <div class="col-4">
            <?= $form->field($model, 'starttime')->widget(MaskedInput::className(), [
                'mask' => 'Hh:s0:s0', // Định dạng giờ giới hạn từ 00 đến 23
                'definitions' => [
                    'H' => ['validator' => '[0-2]', 'cardinality' => 1],
                    'h' => ['validator' => '[0-9]', 'cardinality' => 1, 'prevalidator' => [['validator' => '[01]', 'cardinality' => 1]]],
                    's' => ['validator' => '[0-5]', 'cardinality' => 1],
                    '0' => ['validator' => '[0-9]', 'cardinality' => 1],
                ],
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'endtime')->widget(MaskedInput::className(), [
                'mask' => 'Hh:s0:s0', // Định dạng giờ giới hạn từ 00 đến 23
                'definitions' => [
                    'H' => ['validator' => '[0-2]', 'cardinality' => 1],
                    'h' => ['validator' => '[0-9]', 'cardinality' => 1, 'prevalidator' => [['validator' => '[01]', 'cardinality' => 1]]],
                    's' => ['validator' => '[0-5]', 'cardinality' => 1],
                    '0' => ['validator' => '[0-9]', 'cardinality' => 1],
                ],
                'options' => ['class' => 'form-control'],
            ]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'shifttype')->dropDownList($shiftTypes) ?>
        </div>
        <div class="col-4 pt-4 mt-2">
            <?= $form->field($model, 'locked')->checkbox() ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>