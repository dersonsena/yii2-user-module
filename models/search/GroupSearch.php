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
            [['name'], 'string', 'max' => 60],
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
            'sort'=> [
                'defaultOrder' => ['name' => SORT_ASC]
            ],
            'pagination' => [
                'pageSize' => Yii::$app->params['pagination']['pageSize'],
            ],
        ]);

        $this->load($params);

        if (!$this->validate())
            return $dataProvider;

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}