<?php

/**
 * This is the model class for table "pelicula".
 *
 * The followings are the available columns in table 'pelicula':
 * @property integer $id
 * @property string $nombrePelicula
 * @property integer $precio
 * @property string $estado
 * @property integer $duracionMinutos
 *
 * The followings are the available model relations:
 * @property Actor[] $actors
 * @property Director[] $directors
 * @property Prestamo[] $prestamos
 * @property Tipopelicula[] $tipopeliculas
 */
class Pelicula extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pelicula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombrePelicula, precio, estado, duracionMinutos', 'required'),
			array('precio, duracionMinutos', 'numerical', 'integerOnly'=>true),
			array('nombrePelicula, estado', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombrePelicula, precio, estado, duracionMinutos', 'safe', 'on'=>'search'),
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
			'actors' => array(self::MANY_MANY, 'Actor', 'actor_video(videoid, actorid)'),
			'directors' => array(self::MANY_MANY, 'Director', 'director_pelicula(peliculaid, directorid)'),
			'prestamos' => array(self::MANY_MANY, 'Prestamo', 'prestamo_pelicula(peliculaid, prestamoid)'),
			'tipopeliculas' => array(self::MANY_MANY, 'Tipopelicula', 'tipopelicula_video(videoid, tipoPeliculaid)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombrePelicula' => 'Nombre Pelicula',
			'precio' => 'Precio',
			'estado' => 'Estado',
			'duracionMinutos' => 'Duracion Minutos',
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
		$criteria->compare('nombrePelicula',$this->nombrePelicula,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('duracionMinutos',$this->duracionMinutos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pelicula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
