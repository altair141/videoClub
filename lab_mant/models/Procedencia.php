<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedencia".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property RceExamen[] $rceExamens
 */
class Procedencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'procedencia';
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
    public function getRceExamens()
    {
        return $this->hasMany(RceExamen::className(), ['procedencia_id' => 'id']);
    }
}
