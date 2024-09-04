<?php
use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var yii\data\ArrayDataProvider $dataProvider */
/** @var int $point */

$this->title = 'Vouchers';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<p><strong>Điểm hiện có: </strong> <?= $point ?></p>

<?= GridView::widget([
    'tableOptions' => ['class' => 'table table-bordered table-hover table table-striped'],
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'image_url',
            'format' => 'html',
            'value' => function ($model) {
                return Html::img($model->image_url, ['width' => '100px']);
            },
        ],
        'name',
        [
            'attribute' => 'valid_to',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'text-align: center;'],
        ],
        [
            'attribute' => 'point',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'text-align: center;'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{redeem}',
            'buttons' => [
                'redeem' => function ($url, $model) {
                    return Html::a('Đổi', ['redeem', 'id' => $model->id], [
                        'class' => 'btn btn-primary',
                        'data-method' => 'post',
                        'data-confirm' => 'Đổi voucher này?',
                    ]);
                },
            ],
            'contentOptions' =>['class'=> 'text-center'],
        ],
    ],
]); ?>

