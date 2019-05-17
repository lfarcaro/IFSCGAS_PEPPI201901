<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesfileFotografiasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesfileFotografiasTable Test Case
 */
class DesfileFotografiasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DesfileFotografiasTable
     */
    public $DesfileFotografias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DesfileFotografias',
        'app.Desfiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DesfileFotografias') ? [] : ['className' => DesfileFotografiasTable::class];
        $this->DesfileFotografias = TableRegistry::getTableLocator()->get('DesfileFotografias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DesfileFotografias);

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
