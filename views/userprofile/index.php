<?php

use app\models\Userprofile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UserprofileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $userprofile */

$this->title = 'User profiles';
$this->params['breadcrumbs'][] = $this->title;

echo DetailView::widget([
    'model' => $userprofile,
    'attributes' => [
        'id',
        'fullname',
        'username',
        'password',
        'idcard',
        'address',
        'phonenumber',
        'bankaccountnumber',
        'taxcode'
    ],
]);

$user = Yii::$app->session->get('user');
?>
<div class="userprofile-index">
  
    
     <p>
         <?= Html::a('Update Profile', ['update', 'id' => $user['id']], ['class' => 'btn btn-primary']) ?>
    </p> 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



</div>
