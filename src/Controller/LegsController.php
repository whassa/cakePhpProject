<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Legs Controller
 *
 * @property \App\Model\Table\LegsTable $Legs
 */
class LegsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $legs = $this->paginate($this->Legs);

        $this->set(compact('legs'));
        $this->set('_serialize', ['legs']);
    }

    /**
     * View method
     *
     * @param string|null $id Leg id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leg = $this->Legs->get($id, [
            'contain' => ['JourneyLegs']
        ]);

        $this->set('leg', $leg);
        $this->set('_serialize', ['leg']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leg = $this->Legs->newEntity();
        if ($this->request->is('post')) {
            $leg = $this->Legs->patchEntity($leg, $this->request->data);
            if ($this->Legs->save($leg)) {
                $this->Flash->success(__('The leg has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leg could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leg'));
        $this->set('_serialize', ['leg']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Leg id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leg = $this->Legs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leg = $this->Legs->patchEntity($leg, $this->request->data);
            if ($this->Legs->save($leg)) {
                $this->Flash->success(__('The leg has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The leg could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('leg'));
        $this->set('_serialize', ['leg']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Leg id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leg = $this->Legs->get($id);
        if ($this->Legs->delete($leg)) {
            $this->Flash->success(__('The leg has been deleted.'));
        } else {
            $this->Flash->error(__('The leg could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
		public function isAuthorized($user)
{
    
    return parent::isAuthorized($user);
}
}
