<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "administrador".
 *
 * @property integer $id
 * @property integer $persona_id
 *
 * @property Persona $persona
 * @property Hora[] $horas
 */
class Administrador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'administrador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id'], 'required'],
            [['persona_id'], 'integer']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }

    public function getNombres()
    {
        $persona = Persona::find()->where(['id' => $this->persona_id])->one();
        return $persona->getfullName();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHoras()
    {
        return $this->hasMany(Hora::className(), ['administrador_id' => 'id']);
    }
}
