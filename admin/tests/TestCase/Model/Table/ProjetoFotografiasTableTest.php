<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjetoFotografiasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjetoFotografiasTable Test Case
 */
class ProjetoFotografiasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjetoFotografiasTable
     */
    public $ProjetoFotografias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjetoFotografias',
        'app.Projetos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjetoFotografias') ? [] : ['className' => ProjetoFotografiasTable::class];
        $this->ProjetoFotografias = TableRegistry::getTableLocator()->get('ProjetoFotografias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjetoFotografias);

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
