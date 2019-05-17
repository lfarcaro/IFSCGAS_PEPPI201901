<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesfilesTable Test Case
 */
class DesfilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DesfilesTable
     */
    public $Desfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Desfiles',
        'app.DesfileFotografias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Desfiles') ? [] : ['className' => DesfilesTable::class];
        $this->Desfiles = TableRegistry::getTableLocator()->get('Desfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Desfiles);

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
}
