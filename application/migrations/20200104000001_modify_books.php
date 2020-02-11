<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Migration_modify_books extends CI_Migration
{
    public function up()
    {

        if ($this->db->table_exists('data_buku')) {
            $fields = [
                'approved' => [
                    'type'      => 'INT',
                    'constraint'=> 1,
                    'default'   => 0,
                    'after'     => 'id'
                ]
            ];

            $this->dbforge->add_column('data_buku', $fields);
        }

    }

    public function down()
    {
        $this->dbforge->drop_column('data_buku', 'approved');
    }
}