<?php

namespace backend\models;

/**
 * This is the model class for table "{{%city}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Location[] $locations
 */
class City extends common\models\City {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%city}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 96],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations() {
        return $this->hasMany(Location::className(), ['city_id' => 'id']);
    }

}
