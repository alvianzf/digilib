<?php defined('BASEPATH') OR exit('NO!');

class Migration_Create_Books extends CI_Migration
{
    public function up()
    {
        if (!$this->db->table_exists('data_buku')) {
            $this->dbforge->add_key('id', true);

            $this->dbforge->add_field(
                [
                    'id' => [
                        'type'          => 'MEDIUMINT',
                        'constraint'    => 11,
                        'unsigned'      => true,
                        'auto_increment'=> true
                    ],
                    'judul_buku' => [
                        'type'          => 'VARCHAR',
                        'constraint'    => 225,
                        'null'          => false
                    ],
                    'pengarang' => [
                        'type'          => 'VARCHAR',
                        'constraint'    => 225,
                        'null'
                    ],
                    'kategori'=> [
                        'type'          => 'VARCHAR',
                        'constraint'    => 225,
                        'null'
                    ],
                    'ringkasan'=> [
                        'type'          => 'TEXT',
                        'null'
                    ],
                    'pdf_name'=> [
                        'type'          => 'VARCHAR',
                        'constraint'    => 225,
                        'null'          => true
                    ],
                    'foto_cover_name'=> [
                        'type'          => 'VARCHAR',
                        'constraint'    => 225,
                        'null'          => true
                    ],
                    'path'=> [
                        'type'          => 'VARCHAR',
                        'constraint'    => 225,
                        'null'          => true
                    ],
                    'foto_cover_path'=> [
                        'type'          => 'VARCHAR',
                        'constraint'    => 225,
                        'null'          => true
                    ],
                    'created_at' => [
                        'type'         => 'INT',
                        'constraint'   => 11
                    ]
                ]
            );

            $this->dbforge->create_table('data_buku', true);
        }

    }

    public function down()
    {
        $this->dbforge->drop_table('data_buku', true);
    }
}