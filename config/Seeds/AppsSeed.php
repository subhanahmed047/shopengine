<?php
use Phinx\Seed\AbstractSeed;

/**
 * MenuItem seed.
 */
class AppsSeed extends AbstractSeed
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
        $data = [];         
        $data = [
                     'id' => 1,
                    'title' => "Shop"

        ];
        $table = $this->table('Apps');
        $table->insert($data)->save();
    }

}
