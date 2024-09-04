<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "approveworkschedule".
 *
 * @property int $id
 * @property int $workscheduleid
 * @property int $staffid
 * @property string $workdate
 * @property string $starttime
 * @property string $endtime
 * @property string|null $shifttype
 * @property string|null $description
 * @property int $status
 * @property int|null $locked
 * @property string|null $createdat
 * @property string|null $updatedat
 * @property string|null $reason
 */
class ApproveWorkSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approveworkschedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workscheduleid', 'staffid', 'workdate', 'starttime', 'endtime'], 'required'],
            [['workscheduleid', 'staffid', 'status', 'locked'], 'integer'],
            [['workdate', 'starttime', 'endtime', 'createdat', 'updatedat'], 'safe'],
            [['description'], 'string'],
            [['shifttype'], 'string', 'max' => 50],
            [['reason'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'workscheduleid' => 'Workscheduleid',
            'staffid' => 'Staffid',
            'workdate' => 'Ngày làm việc',
            'starttime' => 'Giờ bắt đầu',
            'endtime' => 'Giờ kết thúc',
            'shifttype' => 'Ca làm việc',
            'description' => 'Mô tả',
            'locked' => 'Xin nghỉ',
            'reason' => 'Lí do thay đổi',
        ];
    }
}
