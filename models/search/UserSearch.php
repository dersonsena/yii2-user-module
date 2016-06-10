<?php

namespace dersonsena\userModule\models\search;

use Yii;
use dersonsena\userModule\models\User;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'grupo_id', 'status'], 'integer'],
            [['nome','email'], 'string', 'max' => 60],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params)
    {
        if(empty($params['status']))
            $this->status = '';

        /** @var Query $query */
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['pagination']['pageSize'],
            ],
        ]);

        $this->load($params);

        if (!$this->validate())
            return $dataProvider;

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['grupo_id' => $this->grupo_id]);
        $query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['like', 'nome', $this->nome]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->orderBy('nome');

        return $dataProvider;
    }
}