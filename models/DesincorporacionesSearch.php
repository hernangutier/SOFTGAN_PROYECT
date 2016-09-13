<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Desincorporaciones;

/**
 * DesincorporacionesSearch represents the model behind the search form about `app\models\Desincorporaciones`.
 */
class DesincorporacionesSearch extends Desincorporaciones
{
    /**
     * @inheritdoc
     *
     */
    public $rango_fecha;
    public $fecha_desde;
    public $fecha_hasta;

    public function rules()
    {
        return [
            [['cod', 'codbov', 'peso', 'codcat', 'codtipo'], 'integer'],
            [['fregistro', 'fecha', 'observaciones','rango_fecha', 'fecha_desde', 'fecha_hasta'], 'safe'],
            [['costo_carne'], 'number'],
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
        $query = Desincorporaciones::find();

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
            'fregistro' => $this->fregistro,
            'fecha' => $this->fecha,
            'peso' => $this->peso,
            'codcat' => $this->codcat,
            'costo_carne' => $this->costo_carne,
            'codtipo' => $this->codtipo,
        ]);

        if (isset($this->rango_fecha) && !empty($this->rango_fecha)) {
            list($this->fecha_desde, $this->fecha_hasta) = explode(' - ', $this->rango_fecha);
        }

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);
        $query->andFilterWhere(['>=', 'fecha', $this->fecha_desde]);
        $query->andFilterWhere(['<=', 'fecha', $this->fecha_hasta]);

        return $dataProvider;
    }
}
