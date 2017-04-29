<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%request}}".
 *
 * @property integer $id
 * @property integer $status_id
 * @property integer $problem_id
 * @property string $problem_details
 * @property integer $customer_id
 * @property string $contact_person_name
 * @property string $phone
 * @property integer $city_id
 * @property integer $location_id
 * @property string $address
 * @property string $installed_items_details
 * @property integer $installed_items_cost
 * @property integer $labour_cost
 * @property integer $total_cost
 * @property string $operator_feedback
 * @property string $admin_feedback
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Customer $customer
 * @property City $city
 * @property Location $location
 * @property RequestStatus $status
 */
class Request extends \common\models\Request {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['status_id', 'problem_id', 'contact_person_name', 'phone', 'city_id', 'location_id', 'address'], 'required'],
            [['status_id', 'problem_id', 'customer_id', 'city_id', 'location_id', 'installed_items_cost', 'labour_cost', 'total_cost'], 'integer'],
            [['problem_details', 'address', 'installed_items_details', 'operator_feedback', 'admin_feedback'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['contact_person_name'], 'string', 'max' => 30],
            [['phone'], 'string', 'max' => 16],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

}
