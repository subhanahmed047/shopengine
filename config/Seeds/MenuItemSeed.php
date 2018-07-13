<?php
use Phinx\Seed\AbstractSeed;

/**
 * MenuItem seed.
 */
class MenuItemSeed extends AbstractSeed
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
                    'title' => "Home",
                    'url' => \Cake\Routing\Router::url(['_name' => 'shop']),
                    'menu_id' => 1
                ],
                1 => [
                    'title' => "Catalog",
                    'url' => \Cake\Routing\Router::url(['prefix' => 'admin', 'controller' => 'Products', 'action' => 'index']),
                    'menu_id' => 1
                ]

            ];

            $table = $this->table('menu_items');
            $table->insert($data)->save();
        }
}
