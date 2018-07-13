<?php
use Migrations\AbstractMigration;

class CreateCategoriesFields extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('categories_fields', ['id' => false, 'primary_key' => ['category_id', 'field_id']]);
        $table
            ->addColumn('category_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('field_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'category_id',
                ]
            )
            ->addIndex(
                [
                    'field_id',
                ]
            )
            ->create();

        $this->table('categories_fields')
            ->addForeignKey(
                'category_id',
                'categories',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'field_id',
                'fields',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {

        $this->table('categories_fields')
            ->dropForeignKey(
                'category_id'
            )
            ->dropForeignKey(
                'field_id'
            );

        $this->dropTable('categories_fields');

    }

}
