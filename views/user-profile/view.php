<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Userprofile $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Userprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$userprofile = Yii::$app->session->get('userprofile');

if ($userprofile) {
    echo "<h1>User Profile</h1>";
    echo "<p>Full Name: " . Html::encode($userprofile->fullname) . "</p>";
    echo "<p>Identity Number: " . Html::encode($userprofile->identity_number) . "</p>";
    echo "<p>Tax Code: " . Html::encode($userprofile->tax_code) . "</p>";
    echo "<p>Address: " . Html::encode($userprofile->address) . "</p>";
    echo "<p>Phone Number: " . Html::encode($userprofile->phone_number) . "</p>";
    echo "<p>Bank Account: " . Html::encode($userprofile->bank_account) . "</p>";
}
?>


<div class="userprofile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employee_id',
            'fullname',
            'username',
            'idcard',
            'taxcode',
            'address:ntext',
            'phonenumber',
            'bankaccountnumber',
            'password',
            // 'token',
            // 'created_at',
            // 'staffids',
            // 'point',
            // 'locked',
        ],
    ]) ?>

</div>
