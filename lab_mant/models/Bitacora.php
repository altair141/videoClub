<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bitacora".
 *
 * @property integer $id
 * @property integer $estado_rce_examen_id
 * @property integer $rce_examen_id
 * @property integer $persona_id_ingresa_bitacora
 * @property string $observacion
 *
 * @property EstadoRceExamen $estadoRceExamen
 * @property Persona $personaIdIngresaBitacora
 * @property RceExamen $rceExamen
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bitacora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_rce_examen_id'], 'required'],
            [['estado_rce_examen_id', 'rce_examen_id', 'persona_id_ingresa_bitacora'], 'integer'],
            [['observacion'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado_rce_examen_id' => 'Estado Rce Examen',
            'rce_examen_id' => 'RCE Examen',
            'persona_id_ingresa_bitacora' => 'Bitácora Ingresada Por',
            'observacion' => 'Observación',
            'Nombres' => 'Bitácora Ingresada Por',
            'EstadoRCEExamen' => 'Estado RCE Examen',
            'DescripcionRce' => 'RCE Examen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoRceExamen()
    {
        $estado = EstadoRceExamen::find()->where(['id' => $this->estado_rce_examen_id])->one();
        return $estado->descripcion;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaIdIngresaBitacora()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id_ingresa_bitacora']);
    }

    public function getNombres()
    {
        $persona = Persona::find()->where(['id' => $this->persona_id_ingresa_bitacora])->one();
        return $persona->getfullName();
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
