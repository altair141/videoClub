<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;
use app\models\Administrador;
use app\models\Paciente;
use app\models\Profesional;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['rut', 'nombres', 'apellido_paterno', 'apellido_materno', 'email', 'fecha_nacimiento', 'identificadorfacebook'], 'safe'],
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
        $query = Persona::find();


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
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ]);

        $query->andFilterWhere(['like', 'rut', $this->rut])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
            ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'identificadorfacebook', $this->identificadorfacebook]);

        return $dataProvider;
    }

    // public function searchAdmin($params)
    // {
    //     $query = Persona::find()
    //         ->join('INNER JOIN', 'administrador',
    //             'administrador.persona_id = persona.id');


    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //     ]);

    //     $this->load($params);

    //     if (!$this->validate()) {
    //         // uncomment the following line if you do not want to return any records when validation fails
    //         //$query->where('0=1');
    //         return $dataProvider;
    //     }

    //     $query->andFilterWhere([
    //         'id' => $this->id,
    //         'fecha_nacimiento' => $this->fecha_nacimiento,
    //     ]);

    //     $query->andFilterWhere(['like', 'rut', $this->rut])
    //         ->andFilterWhere(['like', 'nombres', $this->nombres])
    //         ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
    //         ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno])
    //         ->andFilterWhere(['like', 'email', $this->email])
    //         ->andFilterWhere(['like', 'identificadorfacebook', $this->identificadorfacebook]);

    //     return $dataProvider;
    // }

    // public function searchPaciente($params)
    // {
    //     $query = Persona::find()
    //         ->join('INNER JOIN', 'paciente',
    //             'paciente.persona_id = persona.id');


    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //     ]);

    //     $this->load($params);

    //     if (!$this->validate()) {
    //         // uncomment the following line if you do not want to return any records when validation fails
    //         //$query->where('0=1');
    //         return $dataProvider;
    //     }

    //     $query->andFilterWhere([
    //         'id' => $this->id,
    //         'fecha_nacimiento' => $this->fecha_nacimiento,
    //     ]);

    //     $query->andFilterWhere(['like', 'rut', $this->rut])
    //         ->andFilterWhere(['like', 'nombres', $this->nombres])
    //         ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
    //         ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno])
    //         ->andFilterWhere(['like', 'email', $this->email])
    //         ->andFilterWhere(['like', 'identificadorfacebook', $this->identificadorfacebook]);

    //     return $dataProvider;
    // }

    // public function searchProfesional($params)
    // {
    //     $query = Persona::find()
    //         ->join('INNER JOIN', 'profesional',
    //             'profesional.persona_id = persona.id');


    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //     ]);

    //     $this->load($params);

    //     if (!$this->validate()) {
    //         // uncomment the following line if you do not want to return any records when validation fails
    //         //$query->where('0=1');
    //         return $dataProvider;
    //     }

    //     $query->andFilterWhere([
    //         'id' => $this->id,
    //         'fecha_nacimiento' => $this->fecha_nacimiento,
    //     ]);

    //     $query->andFilterWhere(['like', 'rut', $this->rut])
    //         ->andFilterWhere(['like', 'nombres', $this->nombres])
    //         ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
    //         ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno])
    //         ->andFilterWhere(['like', 'email', $this->email])
    //         ->andFilterWhere(['like', 'identificadorfacebook', $this->identificadorfacebook]);

    //     return $dataProvider;
    // }


    public function excel($params)
    {
        $query = Persona::find();         
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
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ]);

        $query->andFilterWhere(['like', 'rut', $this->rut])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
            ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'identificadorfacebook', $this->identificadorfacebook]);
             
        return $dataProvider;
    }
}
