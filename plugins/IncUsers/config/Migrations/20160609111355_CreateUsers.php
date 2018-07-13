<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users')
            ->addColumn('username', 'string', [
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('role', 'string', [
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('phone', 'biginteger', [
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('address', 'text', [
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'timestamp', [
                'default' => null,
                'null' => true,
            ]);
        $table->create();
    }
}
