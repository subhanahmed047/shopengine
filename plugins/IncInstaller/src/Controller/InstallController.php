<?php
namespace IncInstaller\Controller;

use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Migrations\Migrations;
use Phinx\Migration;
use Cake\Core\Exception\Exception;
use Cake\Event\Event;

class InstallController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->modelClass = false;
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index']);
    }

    public function index()
    {
        if ($this->request->is('post')) {
            $host = $this->request->data('host');
            $username = $this->request->data('username');
            $password = $this->request->data('password');
            $database = $this->request->data('database');

            $datasource_json = ROOT . DS . "plugins" . DS . "Settings" . DS . "config" . DS . "datasource.json";
            $datasource = json_encode([
                "host" => $host,
                "username" => $username,
                "password" => $password,
                "database" => $database
            ]);

            if (file_put_contents($datasource_json, $datasource)) {
                $migrations = new Migrations();

                $migrations->migrate(['connection' => 'default']);
                if ($migrations->seed()) {
                    $this->redirect(['_name' => 'admin:dashboard']);
                    $this->Flash->success('Welcome to your shop');
                }
            } else {
                $this->Flash->error('Something went wrong.');
            }

        }
    }
}
