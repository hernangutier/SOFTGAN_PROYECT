<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RegistroPesos;

/**
 * RegistroPesosSearch represents the model behind the search form about `app\models\RegistroPesos`.
 */
class RegistroPesosSearch extends RegistroPesos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codbov', 'cod', 'tpeso','ano'], 'integer'],
            [['fecha_plan', 'fecha_real'], 'safe'],
            [['peso',], 'number'],
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
        $query = RegistroPesos::find();

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
            'codbov' => $this->codbov,
            'fecha_plan' => $this->fecha_plan,
            'peso' => $this->peso,
            'cod' => $this->cod,
            'fecha_real' => $this->fecha_real,
            'tpeso' => $this->tpeso,
            'ano'=>$this->ano,
        ]);

        return $dataProvider;
    }
}
