<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hora_examen_solicitado".
 *
 * @property integer $id
 * @property integer $hora_id
 * @property integer $examen_id
 *
 * @property Examen $examen
 * @property Hora $hora
 */
class HoraExamenSolicitado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hora_examen_solicitado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hora_id', 'examen_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hora_id' => 'Hora',
            'examen_id' => 'Examen',
            'HoraInicio' => 'Hora',
            'DescripcionExamen' => 'Examen',
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
    public function getHora()
    {
        return $this->hasOne(Hora::className(), ['id' => 'hora_id']);
    }

    public function getHoraInicio()
    {
        $hora = Hora::find()->where(['id' => $this->hora_id])->one();
        return $hora->hora_inicio;
    }

    public function getFecha()
    {
        $hora = Hora::find()->where(['id' => $this->hora_id])->one();
        return $hora->fecha;
    }

    public function getProfesional()
    {
        $hora = Hora::find()->where(['id' => $this->hora_id])->one();
        $profesional = Profesional::find()->where(['id' => $hora->profesional_id])->one();
        return $profesional->getNombres();
    }

    public function getPaciente()
    {
        $reserva = Reserva::find()->where(['hora_medica_id' => $this->hora_id])->one();
        $paciente = Paciente::find()->where(['id' => $reserva->paciente_id])->one();
        return $paciente->getNombres();
    }

}
