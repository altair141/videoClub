<?php

class Director extends CActiveRecord
{
	/*
	* Indica el nombre de la tabla a ActiveRecord,
	* en este caso, la unica diferencia es la mayus.
	*/
	public function tableName()
	{
		return "director";
	}

	/*
	* Declara relaciones entre tablas para mapeo
	*/
	public function relations()
    {
        return array(
            'pelicula'=>array(self::HAS_MANY, 'Pelicula', 'id_director'),
        );
    }
}