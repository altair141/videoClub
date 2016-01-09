<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hora".
 *
 * @property integer $id
 * @property integer $tipo_hora_id
 * @property integer $profesional_id
 * @property integer $administrador_id
 * @property string $hora_inicio
 * @property integer $tiempo_periodo
 *
 * @property Administrador $administrador
 * @property Profesional $profesional
 * @property TipoHora $tipoHora
 * @property HoraExamenSolicitado[] $horaExamenSolicitados
 * @property Reserva[] $reservas
 */
class Hora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_hora_id', 'profesional_id', 'administrador_id', 'tiempo_periodo'], 'integer'],
            [['hora_inicio', 'fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_hora_id' => 'Tipo de Hora',
            'NombreTipoHora' => 'Tipo de Hora',
            'profesional_id' => 'Profesional',
            'administrador_id' => 'Administrador',
            'hora_inicio' => 'Hora Inicio',
            'fecha' => 'Fecha de Hora Médica',
            'tiempo_periodo' => 'Tiempo Periodo',
            'NombresProfesional' => 'Profesional',
            'NombresAdministrador' => 'Administrador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrador()
    {
        return $this->hasOne(Administrador::className(), ['id' => 'administrador_id']);
    }

    public function getNombresAdministrador()
    {
        $administrador = Persona::find()->where(['id' => $this->administrador_id])->one();
        return $administrador->getfullName();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesional()
    {
        return $this->hasOne(Profesional::className(), ['id' => 'profesional_id']);
    }

    public function getNombresProfesional()
    {
        $profesional = Profesional::find()->where(['id' => $this->profesional_id])->one();
        return $profesional->getNombres();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoHora()
    {
        return $this->hasOne(TipoHora::className(), ['id' => 'tipo_hora_id']);
    }

    public function getNombreTipoHora()
    {
        $tipo_hora = TipoHora::find()->where(['id' => $this->tipo_hora_id])->one();
        return $tipo_hora->nombre;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHoraExamenSolicitados()
    {
        return $this->hasMany(HoraExamenSolicitado::className(), ['hora_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['hora_medica_id' => 'id']);
    }
}
