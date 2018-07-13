<?php
use Phinx\Seed\AbstractSeed;

/**
 * Nodes seed.
 */
class MSeed extends AbstractSeed
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
        $data = [
            0 => [
                'title' => "Footer Navigation"
            ],
            1 => [
                'title' => "Top Navigation"
            ]];

        $table = $this->table('menus');
        $table->insert($data)->save();
    }

}