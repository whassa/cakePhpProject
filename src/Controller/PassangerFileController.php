<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PassangerFile Controller
 *
 * @property \App\Model\Table\PassangerFileTable $PassangerFile
 */
class PassangerFileController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Passangers', 'Files']
        ];
        $passangerFile = $this->paginate($this->PassangerFile);

        $this->set(compact('passangerFile'));
        $this->set('_serialize', ['passangerFile']);
    }

    /**
     * View method
     *
     * @param string|null $id Passanger File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $passangerFile = $this->PassangerFile->get($id, [
            'contain' => ['Passangers', 'Files']
        ]);

        $this->set('passangerFile', $passangerFile);
        $this->set('_serialize', ['passangerFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $passangerFile = $this->PassangerFile->newEntity();
        if ($this->request->is('post')) {
            $passangerFile = $this->PassangerFile->patchEntity($passangerFile, $this->request->data);
            if ($this->PassangerFile->save($passangerFile)) {
                $this->Flash->success(__('The passanger file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The passanger file could not be saved. Please, try again.'));
            }
        }
        $passangers = $this->PassangerFile->Passangers->find('list', ['limit' => 200]);
        $files = $this->PassangerFile->Files->find('list', ['limit' => 200]);
        $this->set(compact('passangerFile', 'passangers', 'files'));
        $this->set('_serialize', ['passangerFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Passanger File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $passangerFile = $this->PassangerFile->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passangerFile = $this->PassangerFile->patchEntity($passangerFile, $this->request->data);
            if ($this->PassangerFile->save($passangerFile)) {
                $this->Flash->success(__('The passanger file has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The passanger file could not be saved. Please, try again.'));
            }
        }
        $passangers = $this->PassangerFile->Passangers->find('list', ['limit' => 200]);
        $files = $this->PassangerFile->Files->find('list', ['limit' => 200]);
        $this->set(compact('passangerFile', 'passangers', 'files'));
        $this->set('_serialize', ['passangerFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Passanger File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passangerFile = $this->PassangerFile->get($id);
        if ($this->PassangerFile->delete($passangerFile)) {
            $this->Flash->success(__('The passanger file has been deleted.'));
        } else {
            $this->Flash->error(__('The passanger file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	
	
		public function isAuthorized($user)
{
    
    return parent::isAuthorized($user);
}
}
