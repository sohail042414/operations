<?php

namespace frontend\models;

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
class Location extends \common\models\Location {

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
    
    
    
    

}
