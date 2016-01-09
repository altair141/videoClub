<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_rce_examen".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Bitacora[] $bitacoras
 */
class EstadoRceExamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_rce_examen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoras()
    {
        return $this->hasMany(Bitacora::className(), ['estado_rce_examen_id' => 'id']);
    }
}
