<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Evenements Controller
 *
 * @property \App\Model\Table\EvenementsTable $Evenements
 */
class EvenementsController extends AppController
{

	public function initialize()
{
    parent::initialize();
    $this->Auth->allow(['get']);
	 $this->Auth->allow(['index','indexFinished']);
}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		//$evenements = $this->paginate($this->Evenements);
		
		$query = $this->Evenements->find('all')->where(['Evenements.is_done' => 0]);
		$results = $query->all();
		$evenements = $results->toArray();
		
        $this->set(compact('evenements'));
        $this->set('_serialize', ['evenements']);
    }

	public function indexFinished()
    {
		//$evenements = $this->paginate($this->Evenements);
		
		$query = $this->Evenements->find('all')->where(['Evenements.is_done' => 1]);
		$results = $query->all();
		$finished = $results->toArray();
		
        $this->set(compact('finished'));
        $this->set('_serialize', ['finished']);
    }
	
    /**
     * View method
     *
     * @param string|null $id Evenement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;
        
        $evenement = $this->Evenements->get($id, [
            'contain' => []
        ]);

        $this->set('evenement', $evenement);
        $this->set('_serialize', ['evenement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $evenements = $this->Evenements->newEntity($this->request->data);
		  if ($this->request->is('post')) {
            $evenements = $this->Evenements->patchEntity($evenements, $this->request->data);
			$evenements->is_done = 0;
            if ($this->Evenements->save($evenements)) {
                //$this->Flash->success(__('The product has been saved.'));
                //return $this->redirect(['action' => 'index']);
                $response = ['result' => 'Events was created.'];
            } else {
                //$this->Flash->error(__('The product could not be saved. Please, try again.'));
                $response = $errors;
            }
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Evenement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;
        $evenements = $this->Evenements->get($id, [
            'contain' => []
        ]);
		if ($this->request->is('post')) {
			$evenements = $this->Evenements->patchEntity($evenements, $this->request->data);
			if ($this->Evenements->save($evenements)) {
					$response = ['result' => 'Events was finished.'];
			} else {
				//$this->Flash->error(__('The product could not be saved. Please, try again.'));
				$response = ['result' => 'Unable to update Events.'];
			 }
		}
        //$his->set(compact('product'));
        //$this->set('_serialize', ['product']);
		
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);;
		
		
    }
	
	
	public function get($is_done = 0) {
		
		$evenements = $this->Evenements->find('all')->where(['evenements.is_done' => $is_done]);
		$this->set(compact('evenements'));
		$this->set('_serialize', ['evenements']);	
		
    }
	
	public function finish($id = null) {
		$data = $this->request->input('json_decode');
        //debug($data); die();
        $id = $data->id;
        $evenements = $this->Evenements->get($id, [
            'contain' => []
        ]);
		if ($this->request->is('post')) {
			$evenements = $this->Evenements->patchEntity($evenements, $this->request->data);
			$evenements->is_done = 1;
			if ($this->Evenements->save($evenements)) {
					$response = ['result' => 'Events was finished.'];
			} else {
				//$this->Flash->error(__('The product could not be saved. Please, try again.'));
				$response = ['result' => 'Unable to update Events.'];
			 }
		}
        //$his->set(compact('product'));
        //$this->set('_serialize', ['product']);
		
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);;
    }
    /**
     * Delete method
     *
     * @param string|null $id Evenement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evenement = $this->Evenements->get($id);
        if ($this->Evenements->delete($evenement)) {
            $this->Flash->success(__('The evenement has been deleted.'));
        } else {
            $this->Flash->error(__('The evenement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
