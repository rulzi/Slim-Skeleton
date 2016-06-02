<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('username', 'string', array('limit' => 255))
              ->addColumn('password', 'string', array('limit' => 255))
              ->addColumn('email', 'string', array('limit' => 255))
              ->addColumn('first_name', 'string', array('limit' => 255))
              ->addColumn('last_name', 'string', array('limit' => 255))
              ->addColumn('created_at', 'datetime')
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->addIndex(array('username', 'email'), array('unique' => true))
              ->save();
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
