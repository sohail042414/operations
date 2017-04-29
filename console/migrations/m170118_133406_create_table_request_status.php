<?php

use yii\db\Migration;

class m170118_133406_create_table_request_status extends Migration {

    public function up() {

        $this->createTable('{{%request_status}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(15)->notNull()->unique(),
            'description' => $this->text(),
        ]);

        //Populate

        $this->insert('{{%request_status}}', [
            'title' => 'Pending/New',
            'description' => 'Request is just added, not considered or no action taken.',
        ]);

        $this->insert('{{%request_status}}', [
            'title' => 'In Operation',
            'description' => 'Request is being resolved.Team sent',
        ]);

        $this->insert('{{%request_status}}', [
            'title' => 'Resolved',
            'description' => 'Reported resoved by team.',
        ]);

        $this->insert('{{%request_status}}', [
            'title' => 'Confirmed',
            'description' => 'Reported resoved by customer (requesting person).',
        ]);

        $this->insert('{{%request_status}}', [
            'title' => 'Closed',
            'description' => 'Confirmed and closed by admin. After customer confirmation',
        ]);

        $this->insert('{{%request_status}}', [
            'title' => 'Discarded',
            'description' => 'Closed without any action taken. Spam request',
        ]);
    }

    public function down() {
        $this->dropTable('{{%request_status}}');
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
