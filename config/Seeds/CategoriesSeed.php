<?php
use Phinx\Seed\AbstractSeed;

/**
 * MenuItem seed.
 */
class CategoriesSeed extends AbstractSeed
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
                'name' => "Shirts"
            ],
            1 => [
                'name' => "Pants"
            ],
            2 => [
                'name' => "Jeans"
            ],
            3 => [
                'name' => "Trousers",
            ],
            4 => [
                'name' => "Shorts",
            ],
            5 => [
                'name' => "Kurta",
            ]
        ];

            $table = $this->table('categories');
            $table->insert($data)->save();
        }

}