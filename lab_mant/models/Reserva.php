<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property integer $id
 * @property integer $paciente_id
 * @property integer $persona_id_ingresa_reserva
 * @property integer $hora_medica_id
 * @property string $fecha
 *
 * @property RceExamen[] $rceExamens
 * @property Hora $horaMedica
 * @property Paciente $paciente
 * @property Persona $personaIdIngresaReserva
 */
class Reserva extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paciente_id', 'persona_id_ingresa_reserva', 'hora_medica_id'], 'integer'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paciente_id' => 'Paciente',
            'persona_id_ingresa_reserva' => 'Persona que Ingresa Reserva',
            'hora_medica_id' => 'Hora Médica',
            'fecha' => 'Fecha de Reserva',
            'NombresPersona' => 'Reserva Ingresada por',
            'tipo_hora_id' => 'Tipo de Hora',
            'profesional_id' => 'Profesional',
            'administrador_id' => 'Administrador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRceExamens()
    {
        return $this->hasMany(RceExamen::className(), ['reserva_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHoraMedica()
    {
        return $this->hasOne(Hora::className(), ['id' => 'hora_medica_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id' => 'paciente_id']);
    }

    public function getNombresPaciente()
    {
        $paciente = Paciente::find()->where(['id' => $this->paciente_id])->one();
        return $paciente->getNombres();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaIdIngresaReserva()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id_ingresa_reserva']);
    }

    public function getNombresPersona()
    {
        $persona = Persona::find()->where(['id' => $this->persona_id_ingresa_reserva])->one();
        return $persona->getfullName();
    }

    public function getHoraInicio()
    {
        $hora = Hora::find()->where(['id' => $this->hora_medica_id])->one();
        return $hora->hora_inicio;
    }

    public function getReservaSelect()
    {
        $hora = Hora::find()->where(['id' => $this->hora_medica_id])->one();
        $profesional = Profesional::find()->where(['id' => $hora->profesional_id])->one();
        return $this->fecha.' '.$this->getHoraInicio().' - '.$this->getNombresPaciente().' - '.$profesional->getNombres();
    }
}
