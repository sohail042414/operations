<?php

namespace frontend\models;

use yii\base\Model;
use frontend\models\Customer;

/**
 * Signup form
 */
class SignupForm extends Model {

    const STATUS_ACTIVE = 1;
    const STATUS_NEW = 2;

    public $username;
    public $fullname;
    public $location_id;
    public $city_id;
    public $email;
    public $phone;
    public $password;
    public $password_again;

    //"^[a-zA-Z0-9_]*$"

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'fullname', 'email', 'password', 'password_again', 'city_id', 'location_id'], 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\Customer', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 6, 'max' => 30],
            [['email', 'username'], 'trim'],
            ['username', 'match', 'pattern' => '/^[a-z0-9_]+$/', 'message' => 'Your username can only contain lower case characters, numbers and underscores.'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\Customer', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if (!$this->validate()) {
            return null;
        }

        $customer = new Customer();
        $customer->username = $this->username;
        $customer->fullname = $this->fullname;
        $customer->email = $this->email;
        $customer->location_id = $this->location_id;
        $customer->city_id = $this->city_id;
        $customer->phone = $this->phone;
        $customer->setPassword($this->password);
        $customer->generateAuthKey();
        $customer->status_id = self::STATUS_ACTIVE;

        return $customer->save() ? $customer : null;
    }

}
