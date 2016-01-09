<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserva;

/**
 * ReservaSearch represents the model behind the search form about `app\models\Reserva`.
 */
class ReservaSearch extends Reserva
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paciente_id', 'persona_id_ingresa_reserva', 'hora_medica_id'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = Reserva::find();

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
            'paciente_id' => $this->paciente_id,
            'persona_id_ingresa_reserva' => $this->persona_id_ingresa_reserva,
            'hora_medica_id' => $this->hora_medica_id,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }

    public function excel($params)
    {
        $query = Reserva::find();         
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
            'paciente_id' => $this->paciente_id,
            'persona_id_ingresa_reserva' => $this->persona_id_ingresa_reserva,
            'hora_medica_id' => $this->hora_medica_id,
            'fecha' => $this->fecha,
        ]);
             
        return $dataProvider;
    }
}
