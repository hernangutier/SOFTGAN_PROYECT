<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Servicios;

/**
 * ServiciosSearch represents the model behind the search form about `\app\models\Servicios`.
 */
class ServiciosSearch extends Servicios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codbov', 'programa_reproductivo', 'status_fisiologico', 'codinterv', 'tipo', 'codtoro', 'codvet', 'result_servicio', 'status_servicio', 'status_parto','efectividad'], 'integer'],
            [['fecha_palpacion', 'fecha_confirmacion', 'diagnostico_reproductivo', 'diagnostico_general', 'observaciones'], 'safe'],
            [['status'], 'boolean'],
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
        $query = Servicios::find()->orderBy(['fecha_palpacion' => SORT_DESC]);


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
            'codbov' => $this->codbov,
            'programa_reproductivo' => $this->programa_reproductivo,
            'status_fisiologico' => $this->status_fisiologico,
            'fecha_palpacion' => $this->fecha_palpacion,
            'fecha_confirmacion' => $this->fecha_confirmacion,
            'codinterv' => $this->codinterv,
            'tipo' => $this->tipo,
            'codtoro' => $this->codtoro,
            'status' => $this->status,
            'codvet' => $this->codvet,
            'efectividad' => $this->efectividad,
            'result_servicio' => $this->result_servicio,
            'status_servicio' => $this->status_servicio,
            'status_parto' => $this->status_parto,
        ]);

        $query->andFilterWhere(['like', 'diagnostico_reproductivo', $this->diagnostico_reproductivo])
            ->andFilterWhere(['like', 'diagnostico_general', $this->diagnostico_general])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
