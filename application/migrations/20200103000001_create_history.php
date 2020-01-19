<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Migration_create_history extends CI_Migration
{
    public function up()
    {

        if (!$this->db->table_exists('history')) {
            $this->dbforge->add_key('id', true);

            $this->dbforge->add_field(
                [
                    'id' => [
                        'type'          => 'MEDIUMINT',
                        'constraint'    => 11,
                        'auto_increment'=> true
                    ],
                    'user_id' => [
                        'type'          => 'MEDIUMINT',
                        'constraint'    => 11,
                        'null'          => false
                    ],
                    'book_id' => [
                        'type'          => 'MEDIUMINT',
                        'constraint'    => 11,
                        'null'          => false
                    ],
                    'created_at' => [
                        'type'          => 'INT',
                        'constraint'    => 11
                    ]
                ]
            );

            $this->dbforge->create_table('history', true);
        }

    }

    public function down()
    {
        $this->dbforge->drop_table('history', true);
    }
}