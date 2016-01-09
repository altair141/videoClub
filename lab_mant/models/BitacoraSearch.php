<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bitacora;

/**
 * BitacoraSearch represents the model behind the search form about `app\models\Bitacora`.
 */
class BitacoraSearch extends Bitacora
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'estado_rce_examen_id', 'rce_examen_id', 'persona_id_ingresa_bitacora'], 'integer'],
            [['observacion'], 'safe'],
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
        $query = Bitacora::find();

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
            'id' => $this->id,
            'estado_rce_examen_id' => $this->estado_rce_examen_id,
            'rce_examen_id' => $this->rce_examen_id,
            'persona_id_ingresa_bitacora' => $this->persona_id_ingresa_bitacora,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }

    public function excel($params)
    {
        $query = Bitacora::find();         
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10000),
        ]);         $this->load($params);         if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }         
        $query->andFilterWhere([
            'id' => $this->id,
            'estado_rce_examen_id' => $this->estado_rce_examen_id,
            'rce_examen_id' => $this->rce_examen_id,
            'persona_id_ingresa_bitacora' => $this->persona_id_ingresa_bitacora,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);
             
        return $dataProvider;
    }
}
