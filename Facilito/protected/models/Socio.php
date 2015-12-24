<?php

/**
 * This is the model class for table "socio".
 *
 * The followings are the available columns in table 'socio':
 * @property integer $id
 * @property string $rut
 * @property string $activo
 * @property integer $codigoIdentificado
 * @property integer $personaid
 * @property string $nombreUsuario
 * @property string $clave
 *
 * The followings are the available model relations:
 * @property Prestamo[] $prestamos
 * @property Persona $persona
 */
class Socio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'socio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut, activo, codigoIdentificado, personaid, nombreUsuario, clave', 'required'),
			array('codigoIdentificado, personaid', 'numerical', 'integerOnly'=>true),
			array('rut', 'length', 'max'=>15),
			array('activo, nombreUsuario, clave', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rut, activo, codigoIdentificado, personaid, nombreUsuario, clave', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'prestamos' => array(self::HAS_MANY, 'Prestamo', 'socioid'),
			'persona' => array(self::BELONGS_TO, 'Persona', 'personaid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rut' => 'Rut',
			'activo' => 'Activo',
			'codigoIdentificado' => 'Codigo Identificado',
			'personaid' => 'Personaid',
			'nombreUsuario' => 'Nombre Usuario',
			'clave' => 'Clave',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('codigoIdentificado',$this->codigoIdentificado);
		$criteria->compare('personaid',$this->personaid);
		$criteria->compare('nombreUsuario',$this->nombreUsuario,true);
		$criteria->compare('clave',$this->clave,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Socio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
