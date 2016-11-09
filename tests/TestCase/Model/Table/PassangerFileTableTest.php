<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PassangerFileTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PassangerFileTable Test Case
 */
class PassangerFileTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PassangerFileTable
     */
    public $PassangerFile;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.passanger_file',
        'app.passangers',
        'app.bookings',
        'app.journey_legs',
        'app.legs',
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
        $config = TableRegistry::exists('PassangerFile') ? [] : ['className' => 'App\Model\Table\PassangerFileTable'];
        $this->PassangerFile = TableRegistry::get('PassangerFile', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PassangerFile);

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
