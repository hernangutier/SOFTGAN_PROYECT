<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bovinos;
use yii\db\Query;

/**
 * BovinosSearch represents the model behind the search form about `\app\models\Bovinos`.
 */
class MadresSearch extends Bovinos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod', 'codraza', 'codganaderia', 'codcat_actual', 'codcat_ingreso', 'codcat_futura', 'codrebano', 'tipo_ingreso', 'peso_nacer','status_fisiologico',], 'integer'],
            [['codbov', 'fnac', 'fcreacion', 'sexo', 'foto', 'fingreso'], 'safe'],
            [['status','isdescartable'], 'boolean'],
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
      //  $query = Bovinos::find()->orderBy('codbov');

        $query = Bovinos::find()->where([
            'in','codcat_actual',(new Query)->select('cod')->from('bovinos_categoria')->where
            (['ind_reproduccion'=>true])->orderBy('codbov')
          ]);



// join with
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
            'fnac' => $this->fnac,
            'fcreacion' => $this->fcreacion,
            'codraza' => $this->codraza,
            'codganaderia' => $this->codganaderia,
            'codcat_actual' => $this->codcat_actual,
            'codcat_ingreso' => $this->codcat_ingreso,
            'codcat_futura' => $this->codcat_futura,
            'codrebano' => $this->codrebano,
            'status' => $this->status,
            'tipo_ingreso' => $this->tipo_ingreso,
            'fingreso' => $this->fingreso,
            'peso_nacer' => $this->peso_nacer,
            'isdescartable'=>$this->isdescartable,
            'status_fisiologico'=>$this->status_fisiologico,
        ]);

        $query->andFilterWhere(['like', 'codbov', $this->codbov])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
