<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RceExamen;

/**
 * RceExamenSearch represents the model behind the search form about `app\models\RceExamen`.
 */
class RceExamenSearch extends RceExamen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'procedencia_id', 'reserva_id', 'persona_id_realiza_examen'], 'integer'],
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
        $query = RceExamen::find();

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
            'procedencia_id' => $this->procedencia_id,
            'reserva_id' => $this->reserva_id,
            'persona_id_realiza_examen' => $this->persona_id_realiza_examen,
        ]);

        return $dataProvider;
    }
}
