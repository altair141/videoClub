<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property string $descripcion
 *
 * @property Persona $persona
 * @property Reserva[] $reservas
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id'], 'required'],
            [['persona_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'persona_id' => 'Persona',
            'descripcion' => 'Descripción',
        ];
    }

    public function getNombres()
    {
        $persona = Persona::find()->where(['id' => $this->persona_id])->one();
        return $persona->getfullName();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['paciente_id' => 'id']);
    }
}
