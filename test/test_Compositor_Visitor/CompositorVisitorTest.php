<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

use Compositor\Part;
use Compositor\Assembly as Assembly;
// use Compositor\Item;
// use Visitor\Visitable as Visitable;
// use Visitor\Visitor as Visitor;

// require_once(getcwd().'/src/Momento.php');

class CompositorVisitorTest extends TestCase
{
    private $assembly;
    private $part;

    protected function setUp()
    {
        $this->assembly = new Assembly('array',array());
        $this->part = new Part(4,4);
    }

    protected function tearDown()
    {
        $this->assembly = NULL;
        $this->part = NULL;
    }

    public function testCreation()
    {
        $preorder = new Preorder();
        $this->assertInstanceOf(Preorder::class, $preorder);
        $this->assertInstanceOf(Assembly::class, $preorder->getItem());
    }
    public function testCreationR()
    {
        $preorder = new PreorderR();
        $this->assertInstanceOf(PreorderR::class, $preorder);
        $this->assertInstanceOf(Assembly::class, $preorder->getItem());
    }

    public function testVisit()
    {
        $preorder = new Preorder();
        $this->assertInstanceOf(Preorder::class, $preorder);
    }

    public function testRVisit()
    {
        $preorder = new PreorderR();
        $this->assertInstanceOf(PreorderR::class, $preorder);
    }
}