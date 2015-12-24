<?php

/**
 * This is the model class for table "prestamo".
 *
 * The followings are the available columns in table 'prestamo':
 * @property integer $id
 * @property string $fechaPrestamo
 * @property string $fechaDevolucion
 * @property integer $socioid
 *
 * The followings are the available model relations:
 * @property Socio $socio
 * @property Pelicula[] $peliculas
 */
class Prestamo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prestamo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaPrestamo, fechaDevolucion, socioid', 'required'),
			array('socioid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fechaPrestamo, fechaDevolucion, socioid', 'safe', 'on'=>'search'),
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
			'socio' => array(self::BELONGS_TO, 'Socio', 'socioid'),
			'peliculas' => array(self::MANY_MANY, 'Pelicula', 'prestamo_pelicula(prestamoid, peliculaid)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fechaPrestamo' => 'Fecha Prestamo',
			'fechaDevolucion' => 'Fecha Devolucion',
			'socioid' => 'Socioid',
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
		$criteria->compare('fechaPrestamo',$this->fechaPrestamo,true);
		$criteria->compare('fechaDevolucion',$this->fechaDevolucion,true);
		$criteria->compare('socioid',$this->socioid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prestamo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
