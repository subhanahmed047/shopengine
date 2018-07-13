<?php
use Phinx\Seed\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * MenuItem seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $hasher = new DefaultPasswordHasher();
        $users = [
            'username' => "admin",
            'password' => $hasher->hash("admin"),
            'name' => "Administrator",
            'role' => "admin"
        ];
        $table = $this->table('users');
        $table->insert($users)->save();
    }
}