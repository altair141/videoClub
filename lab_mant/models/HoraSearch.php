<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hora;

/**
 * HoraSearch represents the model behind the search form about `app\models\Hora`.
 */
class HoraSearch extends Hora
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tipo_hora_id', 'profesional_id', 'administrador_id', 'tiempo_periodo'], 'integer'],
            [['hora_inicio'], 'safe'],
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
        $query = Hora::find();

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
            'tipo_hora_id' => $this->tipo_hora_id,
            'profesional_id' => $this->profesional_id,
            'administrador_id' => $this->administrador_id,
            'hora_inicio' => $this->hora_inicio,
            'tiempo_periodo' => $this->tiempo_periodo,
        ]);

        return $dataProvider;
    }

    public function excel($params)
    {
        $query = Hora::find();         
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
            'tipo_hora_id' => $this->tipo_hora_id,
            'profesional_id' => $this->profesional_id,
            'administrador_id' => $this->administrador_id,
            'hora_inicio' => $this->hora_inicio,
            'tiempo_periodo' => $this->tiempo_periodo,
        ]);
             
        return $dataProvider;
    }
}
