<?php

use yii\db\Migration;

class m170103_140526_create_table_cities extends Migration {

    public function up() {

        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(96)->notNull()->unique(),
        ]);
    }

    public function down() {
        $this->dropTable('{{%city}}');
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
