<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JourneyLegsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JourneyLegsTable Test Case
 */
class JourneyLegsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JourneyLegsTable
     */
    public $JourneyLegs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.journey_legs',
        'app.bookings',
        'app.passangers',
        'app.legs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JourneyLegs') ? [] : ['className' => 'App\Model\Table\JourneyLegsTable'];
        $this->JourneyLegs = TableRegistry::get('JourneyLegs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JourneyLegs);

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
