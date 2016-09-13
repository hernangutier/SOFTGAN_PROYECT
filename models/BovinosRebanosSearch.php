<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BovinosRebanos;

/**
 * BovinosRebanosSearch represents the model behind the search form about `app\models\BovinosRebanos`.
 */
class BovinosRebanosSearch extends BovinosRebanos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codgan'], 'integer'],
            [['descripcion', 'sexo'], 'safe'],
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
        $query = BovinosRebanos::find();

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
            'cod' => $this->cod,
            'codgan' => $this->codgan,

        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['is', 'codgan', null]);

        return $dataProvider;
    }
}
