<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rce_examen".
 *
 * @property integer $id
 * @property integer $procedencia_id
 * @property integer $reserva_id
 * @property integer $persona_id_realiza_examen
 *
 * @property Bitacora[] $bitacoras
 * @property Pago[] $pagos
 * @property Persona $personaIdRealizaExamen
 * @property Procedencia $procedencia
 * @property Reserva $reserva
 * @property RceExamenExamen[] $rceExamenExamens
 */
class RceExamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'rce_examen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['procedencia_id', 'reserva_id', 'persona_id_realiza_examen'], 'required'],
            [['procedencia_id', 'reserva_id', 'persona_id_realiza_examen'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'procedencia_id' => 'Procedencia',
            'reserva_id' => 'Reserva',
            'persona_id_realiza_examen' => 'Persona que Realiza Examen',
            'Fecha',
            'Hora',
            'NombresPaciente' => 'Paciente',
            'NombresPersona' => 'Persona que Realiza Examen',
            'EstadoRCE' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoras()
    {
        return $this->hasMany(Bitacora::className(), ['rce_examen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['rce_examen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaIdRealizaExamen()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id_realiza_examen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcedencia()
    {
        return $this->hasOne(Procedencia::className(), ['id' => 'procedencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['id' => 'reserva_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRceExamenExamens()
    {
        return $this->hasMany(RceExamenExamen::className(), ['rce_examen_id' => 'id']);
    }

    public function getDatosRce(){

        $procedencia = Procedencia::find()->where(['id' => $this->procedencia_id])->one();
        $reserva = Reserva::find()->where(['id' => $this->reserva_id])->one();
        return $procedencia->descripcion.' '.$reserva->getReservaSelect();
    }

    public function getFecha()
    {
        $reserva = Reserva::find()->where(['id' => $this->reserva_id])->one();
        return $reserva->fecha;
    }

    public function getHora()
    {
        $reserva = Reserva::find()->where(['id' => $this->reserva_id])->one();
        $hora = Hora::find()->where(['id' => $reserva->hora_medica_id])->one();
        return $hora->hora_inicio;
    }


    public function getNombresPersona()
    {
        $persona = Profesional::find()->where(['id' => $this->persona_id_realiza_examen])->one();
        return $persona->getNombres();
    }

    public function getNombresPaciente()
    {
        $reserva = Reserva::find()->where(['id' => $this->reserva_id])->one();
        $paciente = Paciente::find()->where(['id' => $reserva->paciente_id])->one();
        return $paciente->getNombres();
    }

    public function getEstadoRCE()
    {
        $bitacora = Bitacora::find()->where(['rce_examen_id' => $this->id])->one();
        $EstadoRCE = EstadoRceExamen::find()->where(['id' => $bitacora->estado_rce_examen_id])->one();
        return $EstadoRCE->descripcion;
    }

    public function getReservasSinRCE()
    {
        $bitacora = Reserva::find()->where(['id' => $this->reserva_id])->one();

    }
}
