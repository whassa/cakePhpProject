<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 */
class BookingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Passangers']
        ];
        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Passangers', 'JourneyLegs']
        ]);

        $this->set('booking', $booking);
        $this->set('_serialize', ['booking']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booking = $this->Bookings->newEntity();
        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->data);
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The booking could not be saved. Please, try again.'));
            }
        }
        $passangers = $this->Bookings->Passangers->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'passangers'));
        $this->set('_serialize', ['booking']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->data);
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The booking could not be saved. Please, try again.'));
            }
        }
        $passangers = $this->Bookings->Passangers->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'passangers'));
        $this->set('_serialize', ['booking']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function isAuthorized($user)
{
    if ($this->request->action === 'add') {
        return true;
    }
    return parent::isAuthorized($user);
}
}
