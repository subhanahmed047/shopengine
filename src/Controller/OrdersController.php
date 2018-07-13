<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Nodes', 'Customers']
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Nodes', 'Customers']
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        $basket_data = $this->checkout();
        $products = $basket_data['nodes'];
        $quantity = $basket_data['total_quantity'];
        $price = $basket_data['total_price'];

        if ($this->request->is('post')) {

            $user_table = TableRegistry::get('customers');
            $user_data = $user_table->newEntity();
            //debug($this->request->data);
            $user_data->first_name = $this->request->data['customer']['first_name'];
            $user_data->last_name = $this->request->data['customer']['last_name'];
            $user_data->email = $this->request->data['customer']['email'];
            $user_data->phone = $this->request->data['customer']['phone'];
            $user_data->billing_address = $this->request->data['customer']['billing_address'];
            $user_data->city = $this->request->data['customer']['city'];
            $user_data->country = $this->request->data['customer']['country'];
            $user_data->role = 0;
            $user_data->status = 0;

            if ($user_table->save($user_data)) {
                //debug($user_data->id);
                $user_id = $user_data->id;
                $order->customers_id = $user_id;
                $order->total_quantity = $quantity;
                $order->total_price = $price;
                $order->payment_method = $this->request->data['payment_method'];
                $this->request->data['payment_method'] == 'Payment on Delivery' ? $order->payment_status = 'Unpaid' : $order->payment_status = 'Paid';
                if ($this->Orders->save($order)) {
                    $orders_products_table = TableRegistry::get('orders_nodes');
                    foreach ($products as $product) {
                        $op = $orders_products_table->newEntity();
                        $op->orders_id = $order->id;
                        $op->nodes_id = $product['id'];
                        $op->quantity = $product['quantity'];
                        if ($orders_products_table->save($op)) {

                        } else {
                            $this->Flash->error(__('Relations could not be saved.'));
                        }
                    }

                    $this->Flash->success(__('The order has been saved.'));
                    $this->redirect(['action' => 'thanks']);
                    $this->Cart->truncateCart();
                } else {
                    $this->Flash->error(__('The order could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('order', 'products', 'customers', 'price', 'quantity'));
        $this->set('_serialize', ['order']);
    }

    public function invoice()
    {

    }

    public function thanks(){

    }

    public function checkout()
    {
        $data = $this->Cart->getCart();
        $basket['nodes'] = $data;
        $total_quantity = 0;
        $total_price = 0;
        if (count($data) == 1) {
            $total_quantity += $data[0]['quantity'];
            $total_price += $data[0]['price'] * $data[0]['quantity'];
        } else {
            foreach ($data as $product) {
                $total_quantity += $product['quantity'];
                $total_price += $product['price'] * $product['quantity'];
            }
        }
        $basket['total_quantity'] = $total_quantity;
        $basket['total_price'] = $total_price;

        //debug($basket);
        return $basket;

    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $nodes = $this->Orders->Nodes->find('list', ['limit' => 200]);
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        $this->set(compact('order', 'nodes', 'customers'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
