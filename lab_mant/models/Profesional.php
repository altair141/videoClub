<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesional".
 *
 * @property integer $id
 * @property integer $persona_id
 *
 * @property Hora[] $horas
 * @property Persona $persona
 */
class Profesional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profesional';
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
        return $this->hasMany(Hora::className(), ['profesional_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }
}
