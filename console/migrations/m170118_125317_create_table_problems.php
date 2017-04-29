<?php

use yii\db\Migration;

class m170118_125317_create_table_problems extends Migration {

    public function up() {

        $this->createTable('{{%problem}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'description' => $this->text(),
        ]);

        $this->insert('{{%problem}}', [
            'title' => 'Altration',
            'description' => 'Change button, fan, socket, etc.',
        ]);

        $this->insert('{{%problem}}', [
            'title' => 'Wiring issue',
            'description' => 'Anyting burned, problem not understood.',
        ]);

        $this->insert('{{%problem}}', [
            'title' => 'New Installation',
            'description' => 'Add new point, fan, socket etc.',
        ]);

        $this->insert('{{%problem}}', [
            'title' => 'Ups set up',
            'description' => 'Install or fix issue with ups.',
        ]);
    }

    public function down() {
        $this->dropTable('{{%problem}}');
        return TRUE;
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
