<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forma_pago".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Pago[] $pagos
 */
class FormaPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forma_pago';
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
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['forma_pago_id' => 'id']);
    }
}
