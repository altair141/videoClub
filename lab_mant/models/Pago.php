<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property integer $id
 * @property integer $forma_pago_id
 * @property integer $rce_examen_id
 * @property double $monto
 * @property double $comprobante
 * @property integer $estadopago
 *
 * @property FormaPago $formaPago
 * @property RceExamen $rceExamen
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monto'], 'required'],
            [['forma_pago_id', 'rce_examen_id', 'estadopago'], 'integer'],
            [['monto', 'comprobante'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'forma_pago_id' => 'Forma de Pago',
            'rce_examen_id' => 'RCE Examen',
            'monto' => 'Monto',
            'comprobante' => 'Comprobante',
            'estadopago' => 'Estado de Pago',
            'DescripcionRce' => 'RCE Examen',
            'DescripcionFormaPago' => 'Forma de Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormaPago()
    {
        return $this->hasOne(FormaPago::className(), ['id' => 'forma_pago_id']);
    }

    // public function getDescripcionFormaPago()
    // {
    //     $forma_pago = FormaPago::find()->where(['id' => $this->forma_pago_id])->one();
    //     return $forma_pago->descripcion;
    // }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRceExamen()
    {
        return $this->hasOne(RceExamen::className(), ['id' => 'rce_examen_id']);
    }

    // public function getDescripcionRce()
    // {
    //     $rce_examen = RceExamen::find()->where(['id' => $this->rce_examen_id])->one();
    //     return $rce_examen->getDatosRce();
    // }
}
