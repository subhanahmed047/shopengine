<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Fieldtypes Controller
 *
 * @property \App\Model\Table\FieldtypesTable $Fieldtypes
 */
class FieldtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $fieldtypes = $this->paginate($this->Fieldtypes);

        $this->set(compact('fieldtypes'));
        $this->set('_serialize', ['fieldtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Fieldtype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fieldtype = $this->Fieldtypes->get($id, [
            'contain' => []
        ]);

        $this->set('fieldtype', $fieldtype);
        $this->set('_serialize', ['fieldtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fieldtype = $this->Fieldtypes->newEntity();
        if ($this->request->is('post')) {
            $fieldtype = $this->Fieldtypes->patchEntity($fieldtype, $this->request->data);
            if ($this->Fieldtypes->save($fieldtype)) {
                $this->Flash->success(__('The fieldtype has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fieldtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('fieldtype'));
        $this->set('_serialize', ['fieldtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fieldtype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fieldtype = $this->Fieldtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fieldtype = $this->Fieldtypes->patchEntity($fieldtype, $this->request->data);
            if ($this->Fieldtypes->save($fieldtype)) {
                $this->Flash->success(__('The fieldtype has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fieldtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('fieldtype'));
        $this->set('_serialize', ['fieldtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fieldtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fieldtype = $this->Fieldtypes->get($id);
        if ($this->Fieldtypes->delete($fieldtype)) {
            $this->Flash->success(__('The fieldtype has been deleted.'));
        } else {
            $this->Flash->error(__('The fieldtype could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
