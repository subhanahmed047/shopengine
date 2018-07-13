<?php
use Phinx\Seed\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
/**
 * MenuItem seed.
 */
class FieldTypesSeed extends AbstractSeed
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
        $fieldtypes = [
            0 => [
                'name' => "password"
            ],
            1 => [
                'name' => "email"
            ],
            2 => [
                'name' => "text"
            ],
            3 => [
                'name' => "radio"
            ],
            4 => [
                'name' => "checkbox"
            ],
            5 => [
                'name' => "file"
            ],
            6 =>[
                'name' =>"checkbox-group"
            ],
            7 =>[
                'name' => "select"
            ],
            8 =>[
                'name' => "radio-group"
            ]



        ];
            $table = $this->table('fieldtypes');
            $table->insert($fieldtypes)->save();
        }

}
