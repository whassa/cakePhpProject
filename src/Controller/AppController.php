<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
		
		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
        $this->loadComponent('Auth',
		['authorize' => ['Controller']], [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
		I18n::Locale($this->request->session()->read('Config.language'));
        $this->Auth->allow(['display','changeLang']);
		/*
        $this->loadComponent('Flash');
		$this->loadComponent('Auth', [
        'authorize' => ['Controller'], // Ajout de cette ligne
        'loginRedirect' => [
            'controller' => 'Passangers',
            'action' => 'index'
        ],
        'logoutRedirect' => [
            'controller' => 'Pages',
            'action' => 'display',
            'home'
			]
		
		]);
	*/
    }
	public function changeLang($lang = 'en_US') {
        I18n::locale($lang);
        $this->request->session()->write('Config.language', $lang);
        return $this->redirect($this->request->referer());
    }
	
	 public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view','home']);
    }
	
	public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
      
	  }
	}
	 public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
	
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
		
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
		$this->viewBuilder()->theme('Twit');
    }
	public function isAuthorized($user)
{
    // Admin peuvent accéder à chaque action
    if (isset($user['role']) && $user['role'] === 'admin' && $user['is_ok'] == 1) {
        return true;
    }
	if (isset($user['role']) && $user['role'] === 'superuser' && $user['is_ok'] == 1) {
        return true;
    } else if (isset($user['role']) && $user['role'] === 'superuser' && $user['is_ok'] == 0) {
		$this->Flash->connexion('Vous n\'avez pas confirmer votre lien, veuillez le confirmer avec le lien suivant : <a href="http://'.$_SERVER['HTTP_HOST'].$this->request->webroot .'users/emailAddfromNothing"> http://www.site.0.0.2/users/emailAdd</a>');
    }
	
	
    // Par défaut refuser
    return false;
}

}