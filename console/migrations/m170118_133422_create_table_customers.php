<?php

use yii\db\Migration;

class m170118_133422_create_table_customers extends Migration {

    public function up() {

//        $this->createTable('{{%customer_status}}', [
//            'id' => $this->primaryKey(),
//            'title' => $this->string(15)->notNull()->unique(),
//        ]);

        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(30)->notNull()->unique(),
            'fullname' => $this->string(30)->notNull(),
            'email' => $this->string(96)->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status_id' => $this->Integer()->notNull(),
            'phone' => $this->string(16),
            'city_id' => $this->integer()->notNull(),
            'location_id' => $this->integer(),
            'address' => $this->text(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey('fk_customer_status_id', '{{%customer}}', 'status_id', '{{%customer_status}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_customer_city_id', '{{%customer}}', 'city_id', '{{%city}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_customer_location_id', '{{%customer}}', 'location_id', '{{%location}}', 'id', 'RESTRICT', 'CASCADE');

        $this->populateStatusData();
    }

    public function populateStatusData() {

        $this->insert('{{%customer_status}}', [
            'title' => 'Active',
        ]);


        $this->insert('{{%customer_status}}', [
            'title' => 'New',
        ]);


        $this->insert('{{%customer_status}}', [
            'title' => 'Suspended',
        ]);


        $this->insert('{{%customer_status}}', [
            'title' => 'Deleted',
        ]);
    }

    public function down() {
        $this->dropTable('{{%customer}}');
        $this->dropTable('{{%customer_status}}');
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
