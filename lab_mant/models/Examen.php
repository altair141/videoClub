<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examen".
 *
 * @property integer $id
 * @property string $descripcion
 * @property double $monto
 * @property string $observaciones
 *
 * @property HoraExamenSolicitado[] $horaExamenSolicitados
 * @property RceExamenExamen[] $rceExamenExamens
 */
class Examen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'examen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monto'], 'number'],
            [['descripcion'], 'string', 'max' => 100],
            [['observaciones'], 'string', 'max' => 500]
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
            'monto' => 'Monto',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHoraExamenSolicitados()
    {
        return $this->hasMany(HoraExamenSolicitado::className(), ['examen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRceExamenExamens()
    {
        return $this->hasMany(RceExamenExamen::className(), ['examen_id' => 'id']);
    }

    public function getInfoExamen()
    {
        return $this->descripcion.' - $'.$this->monto;
    }
}
