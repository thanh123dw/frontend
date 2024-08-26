<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Userprofile $model */

$this->title = 'Update User profile: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Userprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userprofile-update">

     <h1><?= Html::encode($this->title) ?></h1>

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?> -->

    


</div>
