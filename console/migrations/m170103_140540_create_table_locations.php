<?php

use yii\db\Migration;

class m170103_140540_create_table_locations extends Migration {

    public function up() {

        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'name' => $this->string(96)->notNull()->unique(),
            'close_location' => $this->integer(),
            'details' => $this->text(),
        ]);
        $this->addForeignKey('fk_location_city_id', '{{%location}}', 'city_id', '{{%city}}', 'id', 'CASCADE', 'CASCADE');


        $this->populateData();
    }

    public function down() {
        $this->dropTable('{{%location}}');
        return TRUE;
    }

    /**
     * 
     */
    private function populateData() {

        $this->insert('{{%city}}', [
            'name' => 'Islamabad',
        ]);


        $city = $this->db->getLastInsertID();

        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'I8 Markaz',
            'details' => 'I8 Markaz Islamabad',
        ]);

        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'I9 Markaz',
            'details' => 'I9 Markaz Islamabad',
        ]);

        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'H8 Markaz',
            'details' => 'H8 Markaz Islamabad',
        ]);

        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'G9 Markaz',
            'details' => 'G9 Markaz Islamabad',
        ]);

        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'G10 Markaz',
            'details' => 'H9 Markaz Islamabad',
        ]);

        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'G11 Markaz',
            'details' => 'G11 Markaz Islamabad',
        ]);

        $this->insert('{{%city}}', [
            'name' => 'Rawalpindi',
        ]);

        $city = $this->db->getLastInsertID();


        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'Sadar',
            'details' => 'Sadar Rawalpindi',
        ]);


        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'Raja Bazar',
            'details' => 'Raja bazar Rawalpindi',
        ]);


        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'Shamsabad ',
            'details' => 'Shamsabad Rawalpindi',
        ]);


        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'Sadiqabad',
            'details' => 'Sadiqabad Rawalpindi',
        ]);


        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'Faizabad',
            'details' => 'Faizabad Rawalpindi',
        ]);


        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'Scheme 3',
            'details' => 'Scheme 3 Rawalpindi',
        ]);


        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'Westrage',
            'details' => 'Westrage Rawalpindi',
        ]);


        $this->insert('{{%location}}', [
            'city_id' => $city,
            'name' => 'Model Town',
            'details' => 'Model Town Rawalpindi',
        ]);
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
