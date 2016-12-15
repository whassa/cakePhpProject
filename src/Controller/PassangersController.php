<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Passangers Controller
 *
 * @property \App\Model\Table\PassangersTable $Passangers
 */
class PassangersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $passangers = $this->paginate($this->Passangers);

        $this->set(compact('passangers'));
        $this->set('_serialize', ['passangers']);
    }

    /**
     * View method
     *
     * @param string|null $id Passanger id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $passanger = $this->Passangers->get($id, [
            'contain' => []
        ]);

        $this->set('passanger', $passanger);
        $this->set('_serialize', ['passanger']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		// Bâtir la liste des catégories  
        $this->loadModel('Pays');
        $pays = $this->Pays->find('list', ['limit' => 200]);
		
        // Extraire le id de la première catégorie
        $pays = $pays->toArray();
        reset($pays);
        $pays_id = key($pays);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $provinces = $this->Pays->Provinces->find('list', [
            'conditions' => ['provinces.pays_id' => $pays_id],
        ]);
		$passanger = $this->Passangers->newEntity();
        if ($this->request->is('post')) {
				$passanger = $this->Passangers->patchEntity($passanger, $this->request->data);
			
				$poys = $this->Pays->get($passanger->pays_id, [
					'contain' => []
				]);
				$passanger->pays = $poys->nom;
				$passanger->province = $passanger->province_id;
				if ($this->Passangers->save($passanger)) {
					$this->Flash->success(__('The passanger has been saved.'));

					return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The passanger could not be saved. Please, try again.'));
            }
			
        }
    
        $this->set(compact('pays'));
		$this->set(compact('provinces'));
		
	
		$this->set(compact('passanger'));
        $this->set('_serialize', ['passanger']);
		
		
    }

    /**
     * Edit method
     *
     * @param string|null $id Passanger id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		 $this->loadModel('Pays');
		  $this->loadModel('Provinces');
        $passanger = $this->Passangers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
		
            $passanger = $this->Passangers->patchEntity($passanger, $this->request->data);
			
			$poys = $this->Pays->get($passanger->pays_id, [
				'contain' => []
			]);
			
			$passanger->pays = $poys->nom;
			$passanger->province = $passanger->province_id;
			
			
            if ($this->Passangers->save($passanger)) {
                $this->Flash->success(__('The passanger has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The passanger could not be saved. Please, try again.'));
            }
        }
		
		// Bâtir la liste des catégories  
        $this->loadModel('Pays');
        $pays = $this->Pays->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $pays = $pays->toArray();
        reset($pays);
        $pays_id = key($pays);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $provinces = $this->Pays->Provinces->find('list', [
            'conditions' => ['provinces.pays_id' => $pays_id],
        ]);
		
        $this->set(compact('pays'));
		$this->set(compact('provinces'));
		
		
        $this->set(compact('passanger'));
        $this->set('_serialize', ['passanger']);
    }
	
	
    /**
     * Delete method
     *
     * @param string|null $id Passanger id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passanger = $this->Passangers->get($id);
        if ($this->Passangers->delete($passanger)) {
            $this->Flash->success(__('The passanger has been deleted.'));
        } else {
            $this->Flash->error(__('The passanger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	
	
	public function isAuthorized($user)
{
 
    return parent::isAuthorized($user);
}
	
}
