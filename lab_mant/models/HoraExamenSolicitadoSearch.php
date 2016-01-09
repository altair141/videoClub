<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HoraExamenSolicitado;

/**
 * HoraExamenSolicitadoSearch represents the model behind the search form about `app\models\HoraExamenSolicitado`.
 */
class HoraExamenSolicitadoSearch extends HoraExamenSolicitado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hora_id', 'examen_id'], 'integer'],
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
        $query = HoraExamenSolicitado::find();

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
            'hora_id' => $this->hora_id,
            'examen_id' => $this->examen_id,
        ]);

        return $dataProvider;
    }

    public function excel($params)
    {
        $query = HoraExamenSolicitado::find();         
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
            'hora_id' => $this->hora_id,
            'examen_id' => $this->examen_id,
        ]);
             
        return $dataProvider;
    }
}
