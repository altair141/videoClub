<?php

namespace app\models;

use app\models\Persona;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $rut;
    public $nombres;
    public $apellido_paterno;
    public $apellido_materno;
    public $email;
    public $fecha_nacimiento;
    public $identificadorfacebook;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;



    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];

    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de Usuario',
            'password' => 'Contraseña',
        ];
    }

    // /**
    //  * @inheritdoc
    //  */
    // public static function findIdentity($id)
    // {
    //     return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    // }


    public static function findIdentity($id)
    {
        $users = Persona::find()->where(['id'=>$id])->one();
        if(!count($users)){
          return null;
        }
        else{
          //this->password=$users->passwd;
          return new static($users);
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */

    // public static function findByUsername($username)
    // {
    //     foreach (self::$users as $user) {
    //         if (strcasecmp($user['username'], $username) === 0) {
    //             return new static($user);
    //         }
    //     }

    //     return null;
    // }

    public static function findByUsername($username)
    {
        $users= Persona::find()->where(['email' => $username])->one();
        if(!count($users)){
          return null;
        }
        else{
          return  new static ($users);
        }
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    // public function validatePassword($password)
    // {
    //     return $this->password === $password;
    // }

    public function validatePassword($password) {
        return $this->rut === $password;
    }

}
