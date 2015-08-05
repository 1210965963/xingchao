<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZMessage;

/**
 * MessageSearch represents the model behind the search form about `common\models\ZMessage`.
 */
class MessageSearch extends ZMessage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'real_mobile', 'status'], 'integer'],
            [['real_name', 'real_remark', 'created', 'updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = ZMessage::find()->orderBy('created DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'real_mobile' => $this->real_mobile,
            'status' => $this->status,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'real_name', $this->real_name])
            ->andFilterWhere(['like', 'real_remark', $this->real_remark]);

        return $dataProvider;
    }
}
