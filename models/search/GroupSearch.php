<?php

namespace dersonsena\userModule\models\search;

use Yii;
use dersonsena\userModule\models\Group;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class GroupSearch extends Group
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['nome'], 'string', 'max' => 60],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        if(empty($params['status']))
            $this->status = '';
        
        /** @var Query $query */
        $query = Group::find();

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
        $query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['like', 'nome', $this->nome]);
        $query->orderBy('nome');

        return $dataProvider;
    }
}