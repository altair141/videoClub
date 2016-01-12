<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persona}}".
 *
 * @property integer $id
 * @property string $nombres
 * @property string $apellidos
 *
 * @property Actor[] $actors
 * @property Direccion[] $direccions
 * @property Director[] $directors
 * @property Socio[] $socios
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%persona}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nombres', 'apellidos'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actor::className(), ['personaid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccions()
    {
        return $this->hasMany(Direccion::className(), ['personaid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirectors()
    {
        return $this->hasMany(Director::className(), ['personaid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocios()
    {
        return $this->hasMany(Socio::className(), ['personaid' => 'id']);
    }
}
