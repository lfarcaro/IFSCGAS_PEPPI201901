<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArtigoFotografiasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArtigoFotografiasTable Test Case
 */
class ArtigoFotografiasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArtigoFotografiasTable
     */
    public $ArtigoFotografias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ArtigoFotografias',
        'app.Artigos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArtigoFotografias') ? [] : ['className' => ArtigoFotografiasTable::class];
        $this->ArtigoFotografias = TableRegistry::getTableLocator()->get('ArtigoFotografias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArtigoFotografias);

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
