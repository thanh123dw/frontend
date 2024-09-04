<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ApproveWorkSchedule;

/**
 * ApproveWorkScheduleSearch represents the model behind the search form of `app\models\ApproveWorkSchedule`.
 */
class ApproveWorkScheduleSearch extends ApproveWorkSchedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'workscheduleid', 'staffid', 'status', 'locked'], 'integer'],
            [['workdate', 'starttime', 'endtime', 'shifttype', 'description', 'createdat', 'updatedat', 'reason'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ApproveWorkSchedule::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'workscheduleid' => $this->workscheduleid,
            'staffid' => $this->staffid,
            'workdate' => $this->workdate,
            'starttime' => $this->starttime,
            'endtime' => $this->endtime,
            'status' => $this->status,
            'locked' => $this->locked,
            'createdat' => $this->createdat,
            'updatedat' => $this->updatedat,
        ]);

        $query->andFilterWhere(['like', 'shifttype', $this->shifttype])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
