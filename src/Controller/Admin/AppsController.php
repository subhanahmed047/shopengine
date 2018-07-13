<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Apps Controller
 *
 * @property \App\Model\Table\AppsTable $Apps
 */
class AppsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $apps = $this->paginate($this->Apps);

        $this->set(compact('apps'));
        $this->set('_serialize', ['apps']);
    }

    /**
     * View method
     *
     * @param string|null $id App id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $app = $this->Apps->get($id, [
            'contain' => []
        ]);

        $this->set('app', $app);
        $this->set('_serialize', ['app']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $app = $this->Apps->newEntity();
        if ($this->request->is('post')) {
            $app = $this->Apps->patchEntity($app, $this->request->data);
            if ($this->Apps->save($app)) {
                $this->Flash->success(__('The app has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The app could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('app'));
        $this->set('_serialize', ['app']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $app = $this->Apps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $app = $this->Apps->patchEntity($app, $this->request->data);
            if ($this->Apps->save($app)) {
                $this->Flash->success(__('The app has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The app could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('app'));
        $this->set('_serialize', ['app']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $app = $this->Apps->get($id);
        if ($this->Apps->delete($app)) {
            $this->Flash->success(__('The app has been deleted.'));
        } else {
            $this->Flash->error(__('The app could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
