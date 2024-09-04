<?php
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\web\View $this  */
/**  @var array $clubData  */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = $clubData['name'];

echo GridView::widget([
    'dataProvider' => $segmentsDataProvider,
    'columns' => [
          [
            'attribute' => 'id',
            'label' => 'ID',  
        ],
         [
            'attribute' => 'name',
            'label' => 'Tên hoạt động', 
        ],
        [
            'attribute' => 'activity_type',
            'label' => 'Loại hoạt động', 
        ],
        [
            'attribute' => 'distance',
            'label' => 'Quảng đường', 
        ],
        [
            'attribute' => 'average_grade',
            'label' => 'Điểm trung bình', 
        ],
        [
            'attribute' => 'maximum_grade',
            'label' => 'Điểm lớn nhất', 
        ],
        [
            'attribute' => 'city',
            'label' => 'Thành phố', 
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}  ',
        ],
    ],
     'tableOptions' => ['class' => 'table  table-bordered'], // Apply Bootstrap table classes
    'headerRowOptions' => ['class' => 'thead-dark text-center'],
    'rowOptions' => ['class' => 'text-center'],
      'options' => ['class' => 'grid-view'], // Set container options
]);
?>

