<?php
namespace app\models;

use yii\base\Model;

class Voucher extends Model
{
    public $id;
    public $name;
    public $code;
    public $valid_to;
    public $image_url;
    public $point;

    public function rules()
    {
        return [
            [['id', 'name', 'code', 'valid_to', 'image_url', 'point'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên Voucher',
            'code' => 'Mã',
            'valid_to' => 'Ngày Bắt Đầu',
            'image_url' => 'Hình Ảnh',
            'point' => 'Điểm'
        ];
    }
}
