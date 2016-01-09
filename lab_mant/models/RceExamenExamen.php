<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rce_examen_examen".
 *
 * @property integer $id
 * @property integer $rce_examen_id
 * @property integer $examen_id
 * @property double $monto_a_pagar
 *
 * @property Examen $examen
 * @property RceExamen $rceExamen
 */
class RceExamenExamen extends \yii\db\ActiveRecord
{
    public $descripcion;
    public $observaciones;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rce_examen_examen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rce_examen_id', 'examen_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['observaciones'], 'string', 'max' => 500],
            [['monto_a_pagar'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rce_examen_id' => 'RCE Examen',
            'examen_id' => 'Examen',
            'monto_a_pagar' => 'Monto a Pagar',
            'DescripcionExamen' => 'Examen', 
            'DescripcionRce' => 'RCE Examen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamen()
    {
        return $this->hasOne(Examen::className(), ['id' => 'examen_id']);
    }

    public function getDescripcionExamen()
    {
        $examen = Examen::find()->where(['id' => $this->examen_id])->one();
        return $examen->descripcion;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRceExamen()
    {
        return $this->hasOne(RceExamen::className(), ['id' => 'rce_examen_id']);
    }

    public function getDescripcionRce()
    {
        $rce_examen = RceExamen::find()->where(['id' => $this->rce_examen_id])->one();
        return $rce_examen->getDatosRce();
    }
}
