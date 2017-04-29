<?php

use yii\db\Migration;

class m170124_110644_create_rbac_tables extends Migration {

    public function safeUp() {

        $this->createTable('{{%resource}}', [
            'id' => $this->integer()->unique(),
            'title' => $this->string(50)->notNull(),
        ]);

        $this->addPrimaryKey('resource_pkey', '{{%resource}}', 'id');

        $this->createTable('{{%role}}', [
            'role' => $this->string(15)->unique(),
            'title' => $this->string(30)->notNull(),
        ]);

        //Add foreign key to user table for role. 
        $this->addPrimaryKey('role_pkey', '{{%role}}', 'role');

        //Add foreighn key to user table for role. 
        //$this->addForeignKey('fk_user_role', '{{%user}}', 'role', '{{%role}}', 'role', 'NO ACTION', 'NO ACTION');

        $this->createTable('{{%permission}}', [
            'id' => $this->primaryKey(),
            'resource_id' => $this->integer(),
            'role' => $this->string(15),
            'view' => $this->boolean()->defaultValue(FALSE),
            'create' => $this->boolean()->defaultValue(FALSE),
            'update' => $this->boolean()->defaultValue(FALSE),
            'delete' => $this->boolean()->defaultValue(FALSE),
        ]);

        $this->addForeignKey('fk_permission_resource_id', '{{%permission}}', 'resource_id', '{{%resource}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_permission_role', '{{%permission}}', 'role', '{{%role}}', 'role', 'CASCADE', 'RESTRICT');
    }

    public function safeDown() {
        $this->dropForeignKey('fk_permission_resource_id', 'permission');
        $this->dropForeignKey('fk_permission_role', 'permission');
        $this->dropTable('{{%resource}}');
        $this->dropTable('{{%role}}');
        $this->dropTable('{{%permission}}');
        return TRUE;
    }

}
