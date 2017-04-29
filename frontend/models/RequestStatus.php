<?php

namespace frontend\models;

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
class RequestStatus extends \common\models\RequestStatus {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 15],
            [['title'], 'unique'],
        ];
    }

}
