<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pago;

/**
 * PagoSearch represents the model behind the search form about `app\models\Pago`.
 */
class PagoSearch extends Pago
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'forma_pago_id', 'rce_examen_id', 'estadopago'], 'integer'],
            [['monto', 'comprobante'], 'number'],
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
        $query = Pago::find();

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
            'forma_pago_id' => $this->forma_pago_id,
            'rce_examen_id' => $this->rce_examen_id,
            'monto' => $this->monto,
            'comprobante' => $this->comprobante,
            'estadopago' => $this->estadopago,
        ]);

        return $dataProvider;
    }

    public function excel($params)
    {
        $query = Pago::find();         
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
            'forma_pago_id' => $this->forma_pago_id,
            'rce_examen_id' => $this->rce_examen_id,
            'monto' => $this->monto,
            'comprobante' => $this->comprobante,
            'estadopago' => $this->estadopago,
        ]);        
        return $dataProvider;
    }
}
