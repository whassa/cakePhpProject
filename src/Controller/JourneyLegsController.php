<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JourneyLegs Controller
 *
 * @property \App\Model\Table\JourneyLegsTable $JourneyLegs
 */
class JourneyLegsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bookings', 'Legs']
        ];
        $journeyLegs = $this->paginate($this->JourneyLegs);

        $this->set(compact('journeyLegs'));
        $this->set('_serialize', ['journeyLegs']);
    }

    /**
     * View method
     *
     * @param string|null $id Journey Leg id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $journeyLeg = $this->JourneyLegs->get($id, [
            'contain' => ['Bookings', 'Legs']
        ]);

        $this->set('journeyLeg', $journeyLeg);
        $this->set('_serialize', ['journeyLeg']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $journeyLeg = $this->JourneyLegs->newEntity();
        if ($this->request->is('post')) {
            $journeyLeg = $this->JourneyLegs->patchEntity($journeyLeg, $this->request->data);
            if ($this->JourneyLegs->save($journeyLeg)) {
                $this->Flash->success(__('The journey leg has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The journey leg could not be saved. Please, try again.'));
            }
        }
        $bookings = $this->JourneyLegs->Bookings->find('list', ['limit' => 200]);
        $legs = $this->JourneyLegs->Legs->find('list', ['limit' => 200]);
        $this->set(compact('journeyLeg', 'bookings', 'legs'));
        $this->set('_serialize', ['journeyLeg']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Journey Leg id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $journeyLeg = $this->JourneyLegs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $journeyLeg = $this->JourneyLegs->patchEntity($journeyLeg, $this->request->data);
            if ($this->JourneyLegs->save($journeyLeg)) {
                $this->Flash->success(__('The journey leg has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The journey leg could not be saved. Please, try again.'));
            }
        }
        $bookings = $this->JourneyLegs->Bookings->find('list', ['limit' => 200]);
        $legs = $this->JourneyLegs->Legs->find('list', ['limit' => 200]);
        $this->set(compact('journeyLeg', 'bookings', 'legs'));
        $this->set('_serialize', ['journeyLeg']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Journey Leg id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $journeyLeg = $this->JourneyLegs->get($id);
        if ($this->JourneyLegs->delete($journeyLeg)) {
            $this->Flash->success(__('The journey leg has been deleted.'));
        } else {
            $this->Flash->error(__('The journey leg could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
		public function isAuthorized($user)
{
    
    return parent::isAuthorized($user);
}
}
