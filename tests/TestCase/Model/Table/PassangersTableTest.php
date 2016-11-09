<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PassangersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PassangersTable Test Case
 */
class PassangersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PassangersTable
     */
    public $Passangers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.passangers',
        'app.bookings',
        'app.journey_legs',
        'app.legs',
        'app.passanger_file',
        'app.files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Passangers') ? [] : ['className' => 'App\Model\Table\PassangersTable'];
        $this->Passangers = TableRegistry::get('Passangers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Passangers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
