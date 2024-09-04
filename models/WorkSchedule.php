<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workschedule".
 *
 * @property int $id
 * @property int $staffid
 * @property string $workdate
 * @property string $starttime
 * @property string $endtime
 * @property string|null $shifttype
 * @property string|null $description
 * @property string|null $createdat
 * @property string|null $updatedat
 * @property int $locked
 */
class WorkSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workschedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staffid', 'workdate', 'starttime', 'endtime'], 'required'],
            [['staffid', 'locked'], 'integer'],
            [['workdate', 'starttime', 'endtime', 'createdat', 'updatedat'], 'safe'],
            [['description'], 'string'],
            [['shifttype'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staffid' => 'Staffid',
            'workdate' => 'Ngày làm việc',
            'starttime' => 'Giờ bắt đầu',
            'endtime' => 'Giờ kết thúc',
            'shifttype' => 'Ca làm việc',
            'description' => 'Mô tả',
            'createdat' => 'Createdat',
            'updatedat' => 'Updatedat',
            'locked' => 'Bỏ',
        ];
    }
}
