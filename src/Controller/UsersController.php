<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Mailer\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	public function initialize()
{
    parent::initialize();
    $this->Auth->allow(['add','logout','authentification','emailAddfromNothing']);
	// load the Captcha component and set its parameter
    $this->loadComponent('CakeCaptcha.Captcha', [
      'captchaConfig' => 'ExampleCaptcha'
    ]);
}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
	

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$ok = 0;
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			 $isHuman = captcha_validate($this->request->data['CaptchaCode']);

			// clear previous user input, since each Captcha code can only be validated once
			unset($this->request->data['CaptchaCode']);
			if ($isHuman) {
			
				$user = $this->Users->patchEntity($user, $this->request->data);
				$user->identifier = Text::uuid();
				if($user->username == null){
					$ok = 1;
				} else if($user->password == null ){
					$ok = 1;
				} else if($user->role == null){
					$ok = 1;
				} 
					if ($ok == 0) {
						if ($this->Users->save($user)) {
							$this->emailAdd($user);
							$this->Flash->success(__('The user has been saved.'));
							return $this->redirect(['action' => 'index']);
						} else {
							$this->Flash->error(__('The user could not be saved. Please, try again.'));
						}
				} else {
						$this->Flash->error(__('The user could not be saved. Please, enter you\'re data.'));
				}
				} else {
				 $this->Flash->error(__('You need to enter the capchat'));
			}
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
	
	public function emailAdd($user = null){
		$email = new Email();
		$email->emailFormat('html');
		$email->to($user->email);
		$email->subject('Inscription');
		$email->viewVars(
			[
				'identifier' => $user->identifier,
				'nom' => $user->username,
			]
		);
		$email->template('welcome');
		$email->send('welcome');
	}
	public function emailAddfromNothing(){
		$user = $this->Auth->user();
		if($user != null){
			$email = new Email();
			$email->emailFormat('html');
			$email->to($user['email']);
			$email->subject('Inscription');
			$email->viewVars(
				[
					'identifier' => $user["identifier"],
					'nom' => $user['username']
				]
			);
			$email->template('welcome');
			$email->send('welcome');
		}
		return $this->redirect(['action' => 'index']);
		
	}
	public function authentification( $conf = null){
		
		try {
			$query = $this->Users->find('all')->where(['Users.identifier' => $conf]);
			$user = $query->first();
			$user->is_ok = 1;
			$this->Users->save($user);
			 if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
		} catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		
	}
	
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
		public function isAuthorized($user)
	{
		return parent::isAuthorized($user);
	}
}
