<?php

/**
 * This is the model class for table "provincia".
 *
 * The followings are the available columns in table 'provincia':
 * @property integer $id
 * @property string $nombreProvincia
 * @property integer $comunaid
 *
 * The followings are the available model relations:
 * @property Comuna $comuna
 * @property Region[] $regions
 */
class Provincia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'provincia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreProvincia, comunaid', 'required'),
			array('comunaid', 'numerical', 'integerOnly'=>true),
			array('nombreProvincia', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombreProvincia, comunaid', 'safe', 'on'=>'search'),
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
			'comuna' => array(self::BELONGS_TO, 'Comuna', 'comunaid'),
			'regions' => array(self::HAS_MANY, 'Region', 'provinciaid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombreProvincia' => 'Nombre Provincia',
			'comunaid' => 'Comunaid',
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
		$criteria->compare('nombreProvincia',$this->nombreProvincia,true);
		$criteria->compare('comunaid',$this->comunaid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Provincia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
