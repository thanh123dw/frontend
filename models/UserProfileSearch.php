<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserProfile;

/**
 * UserprofileSearch represents the model behind the search form of `app\models\Userprofile`.
 */
class UserProfileSearch extends UserProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'point', 'locked'], 'integer'],
            [['employee_id', 'fullname', 'username', 'idcard', 'taxcode', 'address', 'phonenumber', 'bankaccountnumber', 'password', 'token', 'created_at', 'staffids'], 'safe'],
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
        $query = Userprofile::find();

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
            'created_at' => $this->created_at,
            'point' => $this->point,
            'locked' => $this->locked,
        ]);

        $query->andFilterWhere(['like', 'employee_id', $this->employee_id])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'idcard', $this->idcard])
            ->andFilterWhere(['like', 'taxcode', $this->taxcode])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phonenumber', $this->phonenumber])
            ->andFilterWhere(['like', 'bankaccountnumber', $this->bankaccountnumber])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'staffids', $this->staffids]);

        return $dataProvider;
    }
}
