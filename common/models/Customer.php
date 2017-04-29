<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $fullname
 * @property string $email
 * @property string $auth_key 
 * @property string $password_hash 
 * @property string $password_reset_token 
 * @property integer $status_id 
 * @property string $phone
 * @property integer $city_id
 * @property integer $location_id
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @property Location $location
 * @property City $city
 * @property Request[] $requests
 */
class Customer extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'User Name',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'auth_key' => 'Email',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status_id' => 'Status',
            'phone' => 'Phone',
            'city_id' => 'City',
            'location_id' => 'Location',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation() {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity() {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests() {
        return $this->hasMany(Request::className(), ['customer_id' => 'id']);
    }

}
