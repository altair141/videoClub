<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property string $rut
 * @property string $nombres
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $email
 * @property string $fecha_nacimiento
 * @property string $identificadorfacebook
 *
 * @property Administrador[] $administradors
 * @property Bitacora[] $bitacoras
 * @property Paciente[] $pacientes
 * @property Profesional[] $profesionals
 * @property RceExamen[] $rceExamens
 * @property Reserva[] $reservas
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $perfil;
    public $descripcion;


    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_nacimiento'], 'safe'],
            [['rut'], 'string', 'max' => 15],
            [['nombres', 'apellido_materno'], 'string', 'max' => 50],
            [['apellido_paterno'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 75],
            [['identificadorfacebook'], 'string', 'max' => 150],
            [['perfil'], 'integer'],
            [['descripcion'], 'string', 'max' => 255]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rut' => 'Rut',
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'email' => 'Email',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'identificadorfacebook' => 'Identificador Facebook',
            'perfil' => 'Perfil',
            'descripcion' => 'Descripción',
        ];
    }

    public function getfullName()
    {
        return $this->nombres.' '.$this->apellido_paterno.' '.$this->apellido_materno;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministradors()
    {
        return $this->hasMany(Administrador::className(), ['persona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoras()
    {
        return $this->hasMany(Bitacora::className(), ['persona_id_ingresa_bitacora' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacientes()
    {
        return $this->hasMany(Paciente::className(), ['persona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesionals()
    {
        return $this->hasMany(Profesional::className(), ['persona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRceExamens()
    {
        return $this->hasMany(RceExamen::className(), ['persona_id_realiza_examen' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['persona_id_ingresa_reserva' => 'id']);
    }

    public function getDescripcionPaciente(){
        $paciente = Paciente::find()->where(['persona_id' => $this->id])->one();
        
        if(Paciente::find()->where(['persona_id' => $this->id])->exists()){
            return $paciente->descripcion;    
        } else {
            return 'Descripción No Disponible';
        }
        
    }

    public function getPerfil()
    {
        if(Administrador::find()->where(['persona_id'=>$this->id] )->exists()){
            return 'Administrador';
        } else if(Profesional::find()->where(['persona_id'=>$this->id] )->exists()){
            return 'Profesional';
        } else if(Paciente::find()->where(['persona_id'=>$this->id] )->exists()){
            return 'Paciente';
        }
    }

}
