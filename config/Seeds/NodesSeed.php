<?php
use Phinx\Seed\AbstractSeed;
use Cake\ORM\TableRegistry;

/**
 * MenuItem seed.
 */
class NodesSeed extends AbstractSeed
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
        $products = [];
        for ($i = 0; $i < 5; $i++) {
            $product = [
                'apps_id' => 1,
                'categories_id' => $i % 6,
                'title' => "Sample Product $i",
                'quantity' => $i % 10,
                'status' => 1,
                'price' => ($i + 500) % 1000,
                'node_type' => 'product',
                'image' => 'http://blog.trendstop.com/wp-content/themes/bh_courage/assets/images/placeholder_featured_image.svg',
                'description' => "Spark your child’s imagination with Olive Kids twin sheet sets. Turn naps and bedtimes into an adventure on the high seas with pirate sheets. Give the tools of the trade to your little builder with under-construction-themed sheets. Let your little girl fancy herself a mythical beauty of the ocean with sheets featuring aquatic life and mermaids. Feed your little speedster’s need for the fast and furious with race-car sheets. Find a design your child is sure to love, and look for matching comforter sets to give your child the ultimate imagination-sparking room. Whatever style floats the fancy of your child, these twin sheet sets from Olive Kids are fun, colorful and bright additions to your child’s bedroom decor.",

            ];
            array_push($products, $product);
        }

        $pages = [];
        for ($i = 0; $i < 150; $i++) {
            $page = [
                'apps_id' => 1,
                'title' => "Sample Page $i",
                'status' => 1,
                'node_type' => 'page',
                'description' => "Sample Page",

            ];
            array_push($pages, $page);
        }
        $table = TableRegistry::get('nodes');
        $page_entities = $table->newEntities($pages);
        $table = TableRegistry::get('nodes');
        $product_entities = $table->newEntities($products);

        foreach ($page_entities as $entity) {
            $table->save($entity);
        }

        foreach ($product_entities as $entity) {
            $table->save($entity);
        }
    }

}