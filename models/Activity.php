<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property int $employee_id
 * @property int $distance
 * @property int $time_spent
 * @property string $start_time
 * @property string $end_time
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'distance', 'time_spent', 'start_time', 'end_time'], 'required'],
            [['employee_id', 'distance', 'time_spent'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'distance' => 'Distance',
            'time_spent' => 'Time Spent',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
        ];
    }
}
