<?php

use yii\db\Migration;

class m170124_134745_populate_rbac extends Migration {

    public function safeUp() {

        //Insert roles

        $this->insert('{{%role}}', [
            'role' => 'developer',
            'title' => 'Application Developer',
        ]);

        $this->insert('{{%role}}', [
            'role' => 'owner',
            'title' => 'Owner',
        ]);

        $this->insert('{{%role}}', [
            'role' => 'admin',
            'title' => 'Administrator',
        ]);

        $this->insert('{{%role}}', [
            'role' => 'user',
            'title' => 'Front end User',
        ]);

        //Insert a few resouirces. (resource represents controllers).

        $this->insert('{{%resource}}', [
            'id' => '1100',
            'title' => 'Cities',
        ]);


        $this->insert('{{%resource}}', [
            'id' => '1101',
            'title' => 'Locations',
        ]);

        //Insert few permissions for user

        $this->insert('{{%permission}}', [
            'role' => 'user',
            'resource_id' => '1100',
            'view' => TRUE,
        ]);

        $this->insert('{{%permission}}', [
            'role' => 'user',
            'resource_id' => '1101',
            'view' => TRUE,
        ]);

        //Insert few permissions for admin

        $this->insert('{{%permission}}', [
            'role' => 'admin',
            'resource_id' => '1100',
            'view' => TRUE,
            'create' => TRUE,
        ]);

        $this->insert('{{%permission}}', [
            'role' => 'admin',
            'resource_id' => '1101',
            'view' => TRUE,
            'create' => TRUE,
        ]);
    }

    public function down() {

        $this->delete('{{%permission}}');
        $this->delete('{{%resource}}');
        $this->delete('{{%role}}');
        return TRUE;
    }

}
