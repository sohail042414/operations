<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property string $role
 * @property string $title
 *
 * @property Permission[] $permissions
 */
class Role extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['role', 'title'], 'required'],
            [['role'], 'string', 'max' => 15],
            [['title'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'role' => 'Role',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermissions() {
        return $this->hasMany(Permission::className(), ['role' => 'role']);
    }

}
