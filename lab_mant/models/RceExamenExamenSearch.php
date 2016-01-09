<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RceExamenExamen;

/**
 * RceExamenExamenSearch represents the model behind the search form about `app\models\RceExamenExamen`.
 */
class RceExamenExamenSearch extends RceExamenExamen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rce_examen_id', 'examen_id'], 'integer'],
            [['monto_a_pagar'], 'number'],
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
        $query = RceExamenExamen::find();

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
            'rce_examen_id' => $this->rce_examen_id,
            'examen_id' => $this->examen_id,
            'monto_a_pagar' => $this->monto_a_pagar,
        ]);

        return $dataProvider;
    }

    public function excel($params)
    {
        $query = RceExamenExamen::find();         
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
            'rce_examen_id' => $this->rce_examen_id,
            'examen_id' => $this->examen_id,
            'monto_a_pagar' => $this->monto_a_pagar,
        ]);
             
        return $dataProvider;
    }
}
