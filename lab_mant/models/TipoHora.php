<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_hora".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Hora[] $horas
 */
class TipoHora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_hora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [ 
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHoras()
    {
        return $this->hasMany(Hora::className(), ['tipo_hora_id' => 'id']);
    }
}
