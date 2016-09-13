<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cargos;

/**
 * CargosSearch represents the model behind the search form about `\app\models\Cargos`.
 */
class CargosSearch extends Cargos
{
    
public $rango_fecha;
public $fecha_desde;
public $fecha_hasta;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'coduser', 'codprov', 'ntrans', 'tipo', 'status'], 'integer'],
            [['fecha', 'ffact','rango_fecha','fecha_desde','fecha_hasta', 'nfact'], 'safe'],
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
        

        $query = Cargos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'cod' => $this->cod,
            'fecha' => $this->fecha,
            'coduser' => $this->coduser,
            'codprov' => $this->codprov,
            'ntrans' => $this->ntrans,
            'ffact' => $this->ffact,
            'tipo' => $this->tipo,
            'status' => $this->status,
        ]);

        if (isset($this->rango_fecha) && !empty($this->rango_fecha)) {
            list($this->fecha_desde, $this->fecha_hasta) = explode(' - ', $this->rango_fecha);
        }
        $query->andFilterWhere(['like', 'nfact', $this->nfact]);
        $query->andFilterWhere(['>=', 'fecha', $this->fecha_desde]);
        $query->andFilterWhere(['<=', 'fecha', $this->fecha_hasta]);

        return $dataProvider;
    }
}
