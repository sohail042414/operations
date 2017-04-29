<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%location}}".
 *
 * @property integer $id
 * @property integer $city_id
 * @property string $name
 * @property integer $close_location
 * @property string $details
 *
 * @property City $city
 */
class Location extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%location}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['city_id', 'name'], 'required'],
            [['city_id', 'close_location'], 'integer'],
            [['details'], 'string'],
            [['name'], 'string', 'max' => 96],
            [['name'], 'unique'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'city_id' => 'City',
            'name' => 'Name',
            'close_location' => 'Close Location',
            'details' => 'Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity() {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getCloseLocation() {
        return $this->hasOne(Location::className(), ['id' => 'close_location']);
    }

}
