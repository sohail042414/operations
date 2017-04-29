<?php

namespace common\models;

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
class Request extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%request}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'status_id' => 'Status ID',
            'problem_id' => 'Problem ID',
            'problem_details' => 'Problem Details',
            'customer_id' => 'Customer ID',
            'contact_person_name' => 'Contact Person Name',
            'phone' => 'Phone',
            'city_id' => 'City ID',
            'location_id' => 'Location ID',
            'address' => 'Address',
            'installed_items_details' => 'Installed Items Details',
            'installed_items_cost' => 'Installed Items Cost',
            'labour_cost' => 'Labour Cost',
            'total_cost' => 'Total Cost',
            'operator_feedback' => 'Operator Feedback',
            'admin_feedback' => 'Admin Feedback',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer() {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
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
    public function getLocation() {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus() {
        return $this->hasOne(RequestStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblem() {
        return $this->hasOne(Problem::className(), ['id' => 'problem_id']);
    }

}
