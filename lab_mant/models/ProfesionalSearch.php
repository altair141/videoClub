<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profesional;

/**
 * ProfesionalSearch represents the model behind the search form about `app\models\Profesional`.
 */
class ProfesionalSearch extends Profesional
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'persona_id'], 'integer'],
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
        $query = Profesional::find();

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
            'persona_id' => $this->persona_id,
        ]);

        return $dataProvider;
    }

    public function excel($params)
    {
        $query = Profesional::find();         
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
            'persona_id' => $this->persona_id,
        ]);
             
        return $dataProvider;
    }
}
