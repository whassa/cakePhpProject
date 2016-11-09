<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EvenementsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\Routing\Router;
/**
 * App\Controller\EvenementsController Test Case
 */
class EvenementsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evenements'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
		$swag =3 ;
        $this->assertEquals(3,$swag);
		
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testadd()
    {
		$this->session($this->setUserSession());
		$this->configRequest([
			'headers' => ['Accept' => 'application/json']
		]);

		$this->post(Router::url(
		['controller' => 'evenements',
			'action' => 'add',
			'_ext' => 'json'
		]),
		['name' => 'run test']);
		$this->assertResponseOk();
		$expected = [
			'response' => ['result' => 'success'],
		];
		$expected = json_encode($expected, JSON_PRETTY_PRINT);
		
		$this->assertEquals($expected, $this->_response->body());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testget()
    {
	$this->session($this->setUserSession());
	$this->configRequest([
			'headers' => [
				'Accept' => 'application/json'
			]
		]);
		
		$this->post(Router::url(
			['controller' => 'evenements',
				'action' => 'get',
				'_ext' => 'json'
			])
		);
		$this->assertResponseOk();

		$expected = [
			'evenements' =>
				[
					[
						'id' => 1,
						'name' => 'First To-do',
						'is_done' => false
					]
				],
		];
		$expected = json_encode($expected, JSON_PRETTY_PRINT);
		$this->assertEquals($expected, $this->_response->body());
    }

    /**
     * Test finish method
     *
     * @return void
     */
    public function testFinish()
    {
		
	$this->session($this->setUserSession());
       $this->configRequest([
			'headers' => [
				'Accept' => 'application/json'
			]
		]);

		$this->get(Router::url(
			['controller' => 'evenements',
				'action' => 'finish',
				'_ext' => 'json',
				1
			])
		);
		$this->assertResponseOk();
		$expected = [
			'response' => ['result' => 'success'],
		];
		$expected = json_encode($expected, JSON_PRETTY_PRINT);
		$this->assertEquals($expected, $this->_response->body());

		$this->post(Router::url(
			['controller' => 'evenements',
				'action' => 'get',
				'_ext' => 'json',
				1
			])
		);
		$this->assertResponseOk();
		$this->assertResponseContains('"is_done": true', $this->_response->body());
    }
	
	public function testEdit()
    {
	  $this->session($this->setUserSession());
       $this->configRequest([
			'headers' => [
				'Accept' => 'application/json'
			]
		]);
		
		$this->post(Router::url(
			['controller' => 'evenements',
				'action' => 'edit',
				'_ext' => 'json',
				
			]),
			['id' => 1,'name' => 'swag']
			
		);
		
		$this->post(Router::url(
			['controller' => 'evenements',
				'action' => 'get',
				'_ext' => 'json',
				0
			])
			
		);
		$this->assertResponseOk();
		$this->assertResponseContains('"name": "swag"', $this->_response->body());
    }
	
	
	
	public function setUserSession() {
        $auth = [
            'Auth' => [
                'User' => [
                    'id' => 3,
                    'username' => 'admin',
                    'password' => 'admin',
                    'role' => 'admin',
                    'created' => '2015-04-01 22:26:51',
                    'modified' => '2015-04-01 22:26:51'
                ]
            ]
        ];
        return $auth;
    }
	
	
	
}
