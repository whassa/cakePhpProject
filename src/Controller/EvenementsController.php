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
}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       
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
        $response = ['result' => 'false'];
        $errors = $this->Evenements->validator()->errors($this->request->data);
		
        if (empty($errors)) {
            $Evenements = $this->Evenements->newEntity($this->request->data);

            if ($this->Evenements->save($Evenements)) {
                $response = ['result' => 'success'];
            }
        } else {
            $response['error'] = $errors;
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
        $response = ['result' => 'fail'];
        $errors = $this->Evenements->validator()->errors($this->request->data);
        if (empty($errors)) {

            $Evenements = $this->Evenements->newEntity($this->request->data);
			$id = $this->request->data['id'];
			$Evenements->id = $id;
            if ($this->Evenements->save($Evenements)) {
                $response = ['result' => 'success'];
            }
        } else {
            $response['error'] = $errors;
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
		
		
    }
	
	
	public function get($is_done = 0) {
		
		$evenements = $this->Evenements->find('all')->where(['evenements.is_done' => $is_done]);
		$this->set(compact('evenements'));
		$this->set('_serialize', ['evenements']);	
		
    }
	
	public function finish($EvenementsId = null) {
        $response = ['result' => 'fail'];
        if (!is_null($EvenementsId)) {
            $evenements = TableRegistry::get('Evenements');
            $Evenement = $evenements->get($EvenementsId);
            $evenements->patchEntity($Evenement, ['is_done' => 1]);
            if ($evenements->save($Evenement)) {
                $response = ['result' => 'success'];
            }
        }
		
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
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
