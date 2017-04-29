<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%permission}}".
 *
 * @property integer $id
 * @property integer $resource_id
 * @property string $role
 * @property integer $view
 * @property integer $create
 * @property integer $update
 * @property integer $delete
 *
 * @property Resource $resource
 * @property Role $role0
 */
class Permission extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['resource_id', 'view', 'create', 'update', 'delete'], 'integer'],
            [['role'], 'string', 'max' => 15],
            [['resource_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resource::className(), 'targetAttribute' => ['resource_id' => 'id']],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role' => 'role']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'resource_id' => 'Resource ID',
            'role' => 'Role',
            'view' => 'View',
            'create' => 'Create',
            'update' => 'Update',
            'delete' => 'Delete',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResource() {
        return $this->hasOne(Resource::className(), ['id' => 'resource_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0() {
        return $this->hasOne(Role::className(), ['role' => 'role']);
    }

}
