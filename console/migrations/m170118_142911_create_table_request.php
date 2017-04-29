<?php

use yii\db\Migration;

class m170118_142911_create_table_request extends Migration {

    public function safeUp() {

        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'status_id' => $this->integer()->notNull(),
            'problem_id' => $this->integer()->notNull(),
            'problem_details' => $this->text(),
            'customer_id' => $this->integer()->defaultValue(0),
            'contact_person_name' => $this->string(30)->notNull(),
            'phone' => $this->string(16)->notNull(),
            'city_id' => $this->integer()->notNull(),
            'location_id' => $this->integer()->notNull(),
            'address' => $this->text()->notNull(),
            'installed_items_details' => $this->text(),
            'installed_items_cost' => $this->integer()->defaultValue(0),
            'labour_cost' => $this->integer()->defaultValue(0),
            'total_cost' => $this->Integer()->notNull()->defaultValue(0),
            'operator_feedback' => $this->text(),
            'admin_feedback' => $this->text(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey('fk_request_status_id', '{{%request}}', 'status_id', '{{%request_status}}', 'id', 'RESTRICT', 'CASCADE');
        //$this->addForeignKey('fk_request_problem_id', '{{%request}}', 'problem_id', '{{%problem}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_request_city_id', '{{%request}}', 'city_id', '{{%city}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_request_location_id', '{{%request}}', 'location_id', '{{%location}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_request_customer_id', '{{%request}}', 'customer_id', '{{%customer}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down() {
        $this->dropTable('{{%request}}');
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
