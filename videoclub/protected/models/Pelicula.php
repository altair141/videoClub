<?php

class Pelicula extends CActiveRecord
{
	/*
	* Indica el nombre de la tabla a ActiveRecord,
	* en este caso, la unica diferencia es la "P".
	*/
	public function tableName()
	{
		return "pelicula";
	}

	/*
	* Declara relaciones entre tablas para mapeo
	*/
	 public function relations()
    {
        return array(
            'director'=>array(self::BELONGS_TO, 'Director', 'directorid_director'),
            'genero'=>array(self::BELONGS_TO, 'Genero', 'generoid_genero'),
        );
    }

    /*
    * nombre bonitos para los atributos
    */
    public function attributeLabels()
	{
	  return array(
	   'Titulo' =>'Titulo',
	   'Agno' => 'Año',
	   'stock' => 'Stock'
	  );
	}
}