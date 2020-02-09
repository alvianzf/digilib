<?php defined('BASEPATH') OR exit('NO!');

class Migration_Create_Users extends CI_Migration
{
    public function up()
    {
        if (! $this->db->table_exists(('users')))
        {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'username' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'password' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'role' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 10,
                    'null' 
                ],
                'created_at' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ]
            ]);
            if ($this->dbforge->create_table('users')) {
                $this->db->insert_batch(
                    'users',
                    [
                        [
                            'id'        => 1,
                            'username'  => 'admin',
                            'password'  => hash('sha1', 'admin'),
                            'role'      => 'admin',
                            'created_at'      => time()
                        ],
                        [
                            'id'        => 2,
                            'username'  => 'user',
                            'password'  => hash('sha1', 'user'),
                            'role'      => 'user',
                            'created_at'=> time()
                        ]
                    ]
                );
            }
        }

        if (! $this->db->table_exists(('user_details')))
        {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'user_id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                ],
                'nama' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'kelas' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'nomor_kontak' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 30,
                    'null'          => false
                ],
                'created_at' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ]
            ]);
            if ($this->dbforge->create_table('user_details')) {
                $this->db->insert_batch(
                    'user_details',
                    [
                        [
                            'id'        => 3,
                            'user_id'   => 0,
                            'nama'      => 'Pengguna Umum',
                            'kelas'     => 'umum',
                            'nomor_kontak'  => '----',
                            'created_at'=> time()
                        ],
                        [
                            'id'        => 1,
                            'user_id'   => 1,
                            'nama'      => 'Pustakawan',
                            'kelas'  => 'administrator',
                            'nomor_kontak'  => '081378202071',
                            'created_at'=> time()
                        ],
                        [
                            'id'        => 2,
                            'user_id'   => 2,
                            'nama'      => 'Erin B',
                            'kelas'     => 'X Mesin 1',
                            'nomor_kontak'  => '0878782881021',
                            'created_at'=> time()
                        ]
                    ]
                );
            }
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('users',true);
        $this->dbforge->drop_table('user_details',true);
    }
}