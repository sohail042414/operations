<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%request_status}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 *
 * @property Request[] $requests
 */
class RequestStatus extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%request_status}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests() {
        return $this->hasMany(Request::className(), ['status_id' => 'id']);
    }

}
